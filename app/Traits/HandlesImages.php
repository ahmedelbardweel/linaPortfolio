<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait HandlesImages
{
    protected function manager(): ImageManager
    {
        return new ImageManager(new Driver());
    }

    protected function storeImage(UploadedFile $file, string $disk = 'public', int $maxW = 640, int $maxH = 640): array
    {
        $binary = \file_get_contents($file->getRealPath());
        if (!$binary) {
            $path = $file->store('images', $disk);
            return ['path' => $path, 'data' => ''];
        }

        try {
            $image = $this->manager()->read($binary);
            $image->scaleDown(width: $maxW, height: $maxH);
            $webp = (string) $image->toWebp(quality: 30);
        } catch (\Exception $e) {
            $path = $file->store('images', $disk);
            $data = 'data:' . $file->getMimeType() . ';base64,' . \base64_encode($binary);
            return ['path' => $path, 'data' => $data];
        }

        $name = \pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $webpPath = 'images/' . $name . '_' . \time() . '.webp';

        try {
            if (!\env('VERCEL')) {
                \Illuminate\Support\Facades\Storage::disk($disk)->put($webpPath, $webp);
            }
        } catch (\Exception $e) {
        }

        $data = 'data:image/webp;base64,' . \base64_encode($webp);

        return ['path' => $webpPath, 'data' => $data];
    }

    protected function syncImageToBlob($model, string $pathCol, string $dataCol): void
    {
        $data = $model->{$dataCol} ?? '';
        $binary = $data ? @\base64_decode(\explode(',', $data, 2)[1] ?? '') : null;

        if (!$binary) {
            $path = $model->{$pathCol} ?? '';
            if ($path && !\str_starts_with($path, 'https://')) {
                try {
                    $binary = \Illuminate\Support\Facades\Storage::disk('public')->get($path);
                } catch (\Exception $e) {}
            }
        }
        if (!$binary) return;

        $slug = \strtolower(\class_basename($model));
        $hash = \substr(\md5($pathCol), 0, 8);
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

    protected function generateMobileWebp(string $binary, string $pathCol): ?string
    {
        try {
            $image = $this->manager()->read($binary);
        } catch (\Exception $e) {
            return null;
        }

        [$maxW, $maxH] = match (true) {
            \str_contains($pathCol, 'main')      => [380, 220],
            \str_contains($pathCol, 'right')     => [380, 200],
            \str_contains($pathCol, 'thumbnail') => [180, 135],
            default                             => [160, 128],
        };

        $image->cover($maxW, $maxH);

        return (string) $image->toWebp(quality: 15);
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
