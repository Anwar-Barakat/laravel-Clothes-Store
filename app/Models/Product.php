<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'section_id',
        'category_id',
        'name',
        'code',
        'color',
        'price',
        'discount',
        'weight',
        'video',
        'description',
        'wash_care',
        'fabric',
        'pattern',
        'sleeve',
        'fit',
        'occassion',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_feature',
    ];
}