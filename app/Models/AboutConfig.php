<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutConfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_disabled',
        'title',
        'description',
        'title',
        'description',
        'button_text',
        'button_url',
        'button_url',
    ];
}
