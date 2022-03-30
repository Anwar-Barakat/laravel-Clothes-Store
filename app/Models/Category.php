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
            ->width(1040)
            ->height(500);
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
        $catDetails = Category::select('id', 'parent_id', 'name', 'url', 'description')
            ->with([
                'subCategories' => function ($q) {
                    $q->select('id', 'parent_id')->where('status', 1);
                }
            ])
            ->where('url', $url)
            ->first()
            ->toArray();

        // main cat :
        if ($catDetails['parent_id'] == 0) {

            $breadcrumbs = '<a href="' . url('/shop/' . $catDetails['url']) . '" class="breadcrumb_cat">' . $catDetails['name'] . '</a>';
        } else {
            // subcat
            $parentCat = Category::select('name', 'url')->where('id', $catDetails['parent_id'])->first()->toArray();
            $breadcrumbs = '
                <a href="' . url('/shop/' . $parentCat['url']) . '" class="breadcrumb_cat">' . $parentCat['name'] . '</a>\
                <a href="' . url('/shop/' . $catDetails['url']) . '" class="breadcrumb_cat">' . $catDetails['name'] . '</a>';
        }

        $categoryIds    = [];
        $categoryIds[]  = $catDetails['id'];
        foreach ($catDetails['sub_categories'] as $key => $subCat) {
            // push id of main cat and its subcats into $categoryIds:
            $categoryIds[] = $subCat['id'];
        }

        return [
            'catDetails'        => $catDetails,
            'categoryIds'       => $categoryIds,
            'breadcrumbs'       => $breadcrumbs
        ];
    }
}
