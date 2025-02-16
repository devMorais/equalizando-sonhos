<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabItem extends Model
{
    protected $fillable = [
        'is_disabled',
        'image',
        'title',
        'description',
        'category_id'
    ];

    public function getCategory()
    {
        return $this->belongsTo(TabCategory::class, 'category_id', 'id');
    }
}
