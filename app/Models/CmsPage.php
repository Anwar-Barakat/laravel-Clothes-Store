<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'url' => [
                'source' => 'title'
            ]
        ];
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }
}