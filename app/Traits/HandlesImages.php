<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait HandlesImages
{
    protected function storeImage(UploadedFile $file, string $disk = 'public'): array
    {
        $path = $file->store('images', $disk);
        $data = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file->getRealPath()));
        return ['path' => $path, 'data' => $data];
    }

    protected function imageUrl(?string $data, ?string $path): string
    {
        if ($data) return $data;
        if ($path) return asset('storage/' . $path);
        return '';
    }
}
