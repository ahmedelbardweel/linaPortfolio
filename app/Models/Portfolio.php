<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title', 'description', 'image_path', 'image_data', 'gradient', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function getImageUrlAttribute(): string
    {
        if ($this->image_path) return asset('storage/' . $this->image_path);
        if ($this->image_data) return $this->image_data;
        return '';
    }
}
