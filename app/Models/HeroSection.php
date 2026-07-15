<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['title', 'description', 'main_image', 'main_image_data', 'right_label', 'right_subtitle', 'right_image', 'right_image_data', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getMainImageUrlAttribute(): string
    {
        if (!$this->main_image) return '';
        if (str_starts_with($this->main_image, 'https://')) return $this->main_image;
        return url('img/hero/' . $this->id . '/main');
    }

    public function getRightImageUrlAttribute(): string
    {
        if (!$this->right_image) return '';
        if (str_starts_with($this->right_image, 'https://')) return $this->right_image;
        return url('img/hero/' . $this->id . '/right');
    }
}
