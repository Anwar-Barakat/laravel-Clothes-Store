<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use Notifiable, InteractsWithMedia;
    protected $fillable = [
        'name',
        'url',
        'status',
        'section_id',
        'parent_id',
        'discount',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200);
    }
}
