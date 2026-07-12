<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait HandlesImages
{
    protected function storeImage(UploadedFile $file, string $disk = 'public', int $maxW = 800, int $maxH = 800): array
    {
        $img = @imagecreatefromstring(file_get_contents($file->getRealPath()));
        if (!$img) {
            return ['path' => $file->store('images', $disk), 'data' => ''];
        }

        $ow = imagesx($img);
        $oh = imagesy($img);
        $scale = min($maxW / $ow, $maxH / $oh, 1);
        $nw = (int)round($ow * $scale);
        $nh = (int)round($oh * $scale);

        if ($scale < 1) {
            $resized = imagecreatetruecolor($nw, $nh);
            imagecopyresampled($resized, $img, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
            imagedestroy($img);
            $img = $resized;
        }

        $webp = '';
        $tmp = @fopen('php://temp', 'r+');
        if ($tmp) {
            imagewebp($img, $tmp, 60);
            rewind($tmp);
            $webp = stream_get_contents($tmp);
            fclose($tmp);
        }
        imagedestroy($img);

        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $webpPath = 'images/' . $name . '_' . time() . '.webp';
        \Illuminate\Support\Facades\Storage::disk($disk)->put($webpPath, $webp);

        $data = 'data:image/webp;base64,' . base64_encode($webp);

        return ['path' => $webpPath, 'data' => $data];
    }
}
