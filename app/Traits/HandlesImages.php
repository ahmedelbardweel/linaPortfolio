<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait HandlesImages
{
    protected function storeImage(UploadedFile $file, string $disk = 'public', int $maxW = 640, int $maxH = 640): array
    {
        if (!\function_exists('imagecreatefromstring')) {
            $path = $file->store('images', $disk);
            $data = '';
            $binary = \file_get_contents($file->getRealPath());
            if ($binary) {
                $data = 'data:' . $file->getMimeType() . ';base64,' . \base64_encode($binary);
            }
            return ['path' => $path, 'data' => $data];
        }

        $img = @\imagecreatefromstring(\file_get_contents($file->getRealPath()));
        if (!$img) {
            return ['path' => $file->store('images', $disk), 'data' => ''];
        }

        $ow = \imagesx($img);
        $oh = \imagesy($img);
        $scale = \min($maxW / $ow, $maxH / $oh, 1);
        $nw = (int)\round($ow * $scale);
        $nh = (int)\round($oh * $scale);

        if ($scale < 1) {
            $resized = \imagecreatetruecolor($nw, $nh);
            \imagecopyresampled($resized, $img, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
            \imagedestroy($img);
            $img = $resized;
        }

        $webp = '';
        $tmp = @\fopen('php://temp', 'r+');
        if ($tmp) {
            \imagewebp($img, $tmp, 50);
            \rewind($tmp);
            $webp = \stream_get_contents($tmp);
            \fclose($tmp);
        }
        \imagedestroy($img);

        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $webpPath = 'images/' . $name . '_' . time() . '.webp';
        try {
            if (!env('VERCEL')) {
                \Illuminate\Support\Facades\Storage::disk($disk)->put($webpPath, $webp);
            }
        } catch (\Exception $e) {
            // Ignore write errors on read-only environments
        }

        $data = 'data:image/webp;base64,' . base64_encode($webp);

        return ['path' => $webpPath, 'data' => $data];
    }

    /**
     * Upload image binary to Vercel Blob CDN and update the model column with the returned URL.
     * Also generates and uploads a mobile-optimized variant (-sm.webp) for faster LCP on mobile.
     */
    protected function syncImageToBlob($model, string $pathCol, string $dataCol): void
    {
        $data = $model->{$dataCol} ?? '';
        $binary = $data ? @base64_decode(explode(',', $data, 2)[1] ?? '') : null;

        if (!$binary) {
            $path = $model->{$pathCol} ?? '';
            if ($path && !str_starts_with($path, 'https://')) {
                try {
                    $binary = \Illuminate\Support\Facades\Storage::disk('public')->get($path);
                } catch (\Exception $e) {}
            }
        }
        if (!$binary) return;

        $slug = strtolower(class_basename($model));
        $hash = substr(md5($pathCol), 0, 8);
        $name = "$slug-{$model->id}-$hash.webp";
        $url  = $this->uploadToBlob($binary, $name);
        if ($url) {
            $model->update([$pathCol => $url]);
        }

        $smBinary = $this->generateMobileWebp($binary, $pathCol);
        if ($smBinary) {
            $this->uploadToBlob($smBinary, "$slug-{$model->id}-$hash-sm.webp");
        }
    }

    /**
     * Generate a mobile-optimized WebP from raw image binary.
     * Returns null if GD is unavailable or processing fails.
     */
    protected function generateMobileWebp(string $binary, string $pathCol): ?string
    {
        if (!\function_exists('imagecreatefromstring')) return null;

        $img = @\imagecreatefromstring($binary);
        if (!$img) return null;

        $ow = \imagesx($img);
        $oh = \imagesy($img);

        [$maxW, $maxH] = match (true) {
            str_contains($pathCol, 'main')      => [380, 220],
            str_contains($pathCol, 'right')     => [380, 200],
            str_contains($pathCol, 'thumbnail') => [180, 135],
            default                             => [160, 128],
        };

        $scale = \min($maxW / $ow, $maxH / $oh, 1);
        if ($scale < 1) {
            $nw = (int)\round($ow * $scale);
            $nh = (int)\round($oh * $scale);
            $resized = \imagecreatetruecolor($nw, $nh);
            \imagealphablending($resized, false);
            \imagesavealpha($resized, true);
            \imagecopyresampled($resized, $img, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
            \imagedestroy($img);
            $img = $resized;
        }

        $tmp = @\fopen('php://temp', 'r+');
        if (!$tmp) { \imagedestroy($img); return null; }

        \imagewebp($img, $tmp, 35);
        \rewind($tmp);
        $webp = \stream_get_contents($tmp);
        \fclose($tmp);
        \imagedestroy($img);

        return $webp ?: null;
    }

    protected function cacheImageData(string $table, $model): void
    {
        $cacheDir = env('VERCEL') ? '/tmp/img-cache' : storage_path('framework/cache/img');
        if (!\is_dir($cacheDir)) {
            @\mkdir($cacheDir, 0755, true);
        }

        $pairs = match ($table) {
            'hero' => [['id' => 'main', 'col' => 'main_image_data'], ['id' => 'right', 'col' => 'right_image_data']],
            'story' => [['id' => 'image', 'col' => 'image_data']],
            'portfolio' => [['id' => 'image', 'col' => 'image_data']],
            'reel' => [['id' => 'thumbnail', 'col' => 'thumbnail_data']],
            default => [],
        };

        foreach ($pairs as $pair) {
            $cacheFile = "$cacheDir/$table.{$model->id}.{$pair['id']}";
            if (\file_exists($cacheFile)) {
                @\unlink($cacheFile);
            }
        }
    }

    protected function uploadToBlob(string $binary, string $name, string $mime = 'image/webp'): ?string
    {
        $token = env('BLOB_READ_WRITE_TOKEN');
        if (!$token) return null;

        $path = str_contains($name, '/') ? $name : "images/$name";
        $body = \json_encode(['path' => $path, 'options' => ['access' => 'public']]);
        $ctx = \stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Authorization: Bearer $token\r\nContent-Type: application/json\r\n",
                'content' => $body,
                'timeout' => 15,
                'ignore_errors' => true,
            ],
        ]);

        $response = @\file_get_contents('https://api.vercel.com/v1/blob/upload-url', false, $ctx);
        if ($response === false) return null;

        $data = \json_decode($response, true);
        if (!$data || !isset($data['uploadUrl'], $data['url'])) return null;

        $putCtx = \stream_context_create([
            'http' => [
                'method' => 'PUT',
                'header' => "Content-Type: $mime\r\n",
                'content' => $binary,
                'timeout' => 45, // slightly longer timeout for videos
                'ignore_errors' => true,
            ],
        ]);

        $putResult = @\file_get_contents($data['uploadUrl'], false, $putCtx);
        if ($putResult === false) return null;

        return $data['url'];
    }
}
