<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_disabled',
        'icon',
        'title',
        'description',
    ];
}
