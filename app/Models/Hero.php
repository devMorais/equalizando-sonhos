<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_disabled',
        'background_image',
        'title',
        'description',
        'button_text',
        'button_url',
        'video_url',
    ];
}
