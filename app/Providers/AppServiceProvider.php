<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (env('VERCEL') || !is_writable(storage_path('app/public'))) {
            $tmpStorage = '/tmp/storage';
            if (!is_dir($tmpStorage)) {
                mkdir($tmpStorage, 0755, true);
            }
            config(['filesystems.disks.public.root' => $tmpStorage]);
            config(['filesystems.disks.public.url' => '/storage']);
        }
    }
}
