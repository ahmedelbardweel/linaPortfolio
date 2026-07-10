<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'content', 'type', 'bg_color', 'image_path', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
