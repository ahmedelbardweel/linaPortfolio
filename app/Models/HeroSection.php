<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['title', 'description', 'main_image', 'main_image_data', 'right_label', 'right_subtitle', 'right_image', 'right_image_data', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getMainImageUrlAttribute(): string
    {
        return $this->main_image_data ?: ($this->main_image ? asset('storage/' . $this->main_image) : '');
    }

    public function getRightImageUrlAttribute(): string
    {
        return $this->right_image_data ?: ($this->right_image ? asset('storage/' . $this->right_image) : '');
    }
}
