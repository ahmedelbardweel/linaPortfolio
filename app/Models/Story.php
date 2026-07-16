<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'content', 'type', 'bg_color', 'image_path', 'image_data', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) return '';
        if (str_starts_with($this->image_path, 'https://')) return $this->image_path;
        return url('img/story/' . $this->id . '/image');
    }

    public function getImageUrlSmAttribute(): string
    {
        $url = $this->image_url;
        if (!$url || str_contains($url, 'data:')) return $url;
        if (str_starts_with($url, 'https://') && str_ends_with($url, '.webp')) {
            return str_replace('.webp', '-sm.webp', $url);
        }
        return $url . '?s=sm';
    }
}
