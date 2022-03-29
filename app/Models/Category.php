<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model implements HasMedia
{
    use Notifiable, InteractsWithMedia, sluggable;
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

    public function sluggable(): array
    {
        return [
            'url' => [
                'source' => 'name'
            ]
        ];
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id')->select('id', 'name');
    }

    public static function catDetails($url)
    {
        $catDetails = Category::select('id', 'name', 'url')
            ->with([
                'subCategories' => function ($q) {
                    $q->select('id', 'parent_id')->where('status', 1);
                }
            ])
            ->where('url', $url)
            ->first()
            ->toArray();
        $categoryIds    = [];
        $categoryIds[]  = $catDetails['id'];
        foreach ($catDetails['sub_categories'] as $key => $subCat) {
            // push id of main cat and its subcats into $categoryIds:
            $categoryIds[] = $subCat['id'];
        }

        return [
            'catDetails'        => $catDetails,
            'categoryIds'       => $categoryIds
        ];
    }
}