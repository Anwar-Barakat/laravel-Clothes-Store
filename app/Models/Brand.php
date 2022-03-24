<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'status'
    ];

    public $translatable = ['name'];
}