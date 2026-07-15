<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Story;
use App\Models\Reel;
use App\Traits\HandlesImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SyncImagesToBlob extends Command
{
    use HandlesImages;

    protected $signature = 'images:sync-blob';
    protected $description = 'Upload existing local/database images to Vercel Blob CDN';

    public function handle()
    {
        $this->info('Starting Vercel Blob synchronization...');

        // 1. HeroSection
        $this->info('Syncing Hero Sections...');
        foreach (HeroSection::all() as $hero) {
            foreach (['main_image' => 'main_image_data', 'right_image' => 'right_image_data'] as $pathCol => $dataCol) {
                $val = $hero->{$pathCol} ?? '';
                if ($val && !str_starts_with($val, 'https://')) {
                    $this->info("Syncing Hero #{$hero->id} ($pathCol)...");
                    $this->syncImageToBlob($hero, $pathCol, $dataCol);
                }
            }
        }

        // 2. Portfolio
        $this->info('Syncing Portfolios...');
        foreach (Portfolio::all() as $portfolio) {
            $val = $portfolio->image_path ?? '';
            if ($val && !str_starts_with($val, 'https://')) {
                $this->info("Syncing Portfolio #{$portfolio->id}...");
                $this->syncImageToBlob($portfolio, 'image_path', 'image_data');
            }
        }

        // 3. Story
        $this->info('Syncing Stories...');
        foreach (Story::all() as $story) {
            $val = $story->image_path ?? '';
            if ($val && !str_starts_with($val, 'https://')) {
                $this->info("Syncing Story #{$story->id}...");
                $this->syncImageToBlob($story, 'image_path', 'image_data');
            }
        }

        // 4. Reel (Thumbnails only, videos should use direct uploads)
        $this->info('Syncing Reel Thumbnails...');
        foreach (Reel::all() as $reel) {
            $val = $reel->thumbnail ?? '';
            if ($val && !str_starts_with($val, 'https://')) {
                $this->info("Syncing Reel #{$reel->id} Thumbnail...");
                $this->syncImageToBlob($reel, 'thumbnail', 'thumbnail_data');
            }
        }

        $this->info('All images synchronized to Vercel Blob successfully!');
    }
}
