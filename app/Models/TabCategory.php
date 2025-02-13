<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabCategory extends Model
{
    protected $fillable = [
        'is_disabled',
        'title',
        'slug',
        'icon'
    ];
}
