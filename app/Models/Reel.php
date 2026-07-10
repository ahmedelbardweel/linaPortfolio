<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    protected $fillable = ['title', 'description', 'video_path', 'thumbnail', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
