<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
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
        'occasion',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_feature',
        'status'
    ];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(350)
            ->height(350);
    }

    public const fabricArray    = ['cotton', 'polyester', 'wool'];
    public const sleeveArray    = ['full_sleeve', 'half_sleeve', 'short_sleeve', 'sleeveless'];
    public const patternArray   = ['checked', 'plain', 'printed', 'self', 'solid'];
    public const fitArray       = ['register', 'slim'];
    public const occasionArray  = ['casual', 'formal'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}