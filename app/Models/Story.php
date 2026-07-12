<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'content', 'type', 'bg_color', 'image_path', 'image_data', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getImageUrlAttribute(): string
    {
        return $this->image_data ?: ($this->image_path ? asset('storage/' . $this->image_path) : '');
    }
}
