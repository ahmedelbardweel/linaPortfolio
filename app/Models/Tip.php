<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $fillable = ['title', 'category', 'content', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
