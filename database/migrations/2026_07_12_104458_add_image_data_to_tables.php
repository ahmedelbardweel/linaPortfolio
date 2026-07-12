<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->longText('main_image_data')->nullable()->after('main_image');
            $table->longText('right_image_data')->nullable()->after('right_image');
        });
        Schema::table('stories', function (Blueprint $table) {
            $table->longText('image_data')->nullable()->after('image_path');
        });
        Schema::table('portfolios', function (Blueprint $table) {
            $table->longText('image_data')->nullable()->after('image_path');
        });
        Schema::table('reels', function (Blueprint $table) {
            $table->longText('thumbnail_data')->nullable()->after('thumbnail');
        });
    }

    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropColumn(['main_image_data', 'right_image_data']);
        });
        Schema::table('stories', function (Blueprint $table) {
            $table->dropColumn('image_data');
        });
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('image_data');
        });
        Schema::table('reels', function (Blueprint $table) {
            $table->dropColumn('thumbnail_data');
        });
    }
};
