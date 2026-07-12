<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    protected $fillable = ['title', 'description', 'video_path', 'thumbnail', 'thumbnail_data', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) return asset('storage/' . $this->thumbnail);
        if ($this->thumbnail_data) return $this->thumbnail_data;
        return '';
    }
}
