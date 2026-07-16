<?php

namespace App\Console\Commands;

use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Reel;
use App\Models\Story;
use App\Models\Tip;
use Illuminate\Console\Command;

class CleanupDatabase extends Command
{
    protected $signature = 'db:cleanup';
    protected $description = 'Truncate all content tables to start fresh with WebP-only uploads';

    public function handle()
    {
        HeroSection::truncate();
        Portfolio::truncate();
        Reel::truncate();
        Story::truncate();
        Tip::truncate();

        $this->info('All content tables cleared successfully.');
        $this->warn('Users and Settings tables were preserved.');
        $this->line('Upload only WebP images from now on.');
    }
}
