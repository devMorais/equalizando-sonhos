<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutItens extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_disabled',
        'url',
        'icon',
        'title',
        'description',
    ];
}
