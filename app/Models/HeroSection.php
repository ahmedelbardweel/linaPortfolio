<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['title', 'description', 'main_image', 'main_image_data', 'right_label', 'right_subtitle', 'right_image', 'right_image_data', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getMainImageUrlAttribute(): string
    {
        if ($this->main_image) return asset('storage/' . $this->main_image);
        if ($this->main_image_data) return $this->main_image_data;
        return '';
    }

    public function getRightImageUrlAttribute(): string
    {
        if ($this->right_image) return asset('storage/' . $this->right_image);
        if ($this->right_image_data) return $this->right_image_data;
        return '';
    }
}
