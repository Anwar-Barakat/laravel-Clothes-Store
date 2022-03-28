<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Banner extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'link',
        'title',
        'alternative',
        'status',
    ];

    public $translatable = ['title'];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('banner')
            ->width(1040)
            ->height(400);
    }
}