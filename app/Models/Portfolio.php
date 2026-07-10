<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title', 'description', 'image_path', 'gradient', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
