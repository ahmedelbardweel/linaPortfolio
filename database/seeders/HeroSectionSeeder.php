<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'title'          => "Interior\nDesign",
            'description'    => 'Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.',
            'main_image'     => null,
            'right_label'    => 'Our Recent Work',
            'right_subtitle' => 'We Will Make These Unique Tastes Of Yours A Design Reality!',
            'right_image'    => null,
            'is_active'      => true,
        ]);
    }
}
