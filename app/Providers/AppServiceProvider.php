<?php

namespace App\Providers;

use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Setting;
use App\Models\Story;
use App\Models\Tip;
use Illuminate\Support\Facades\Cache;
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

        $clear = function () {
            foreach (['welcome_hero','welcome_stories','welcome_tips','welcome_portfolios','welcome_settings'] as $k) {
                Cache::forget($k);
            }
        };

        foreach ([HeroSection::class, Story::class, Tip::class, Portfolio::class, Setting::class] as $model) {
            $model::saved($clear);
            $model::deleted($clear);
        }
    }
}
