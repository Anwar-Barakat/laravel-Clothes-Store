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
        'brand_id',
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
        $this->addMediaConversion('large')
            ->width(1040)
            ->height(1200);

        $this->addMediaConversion('medium')
            ->width(600)
            ->height(600);

        $this->addMediaConversion('small')
            ->width(300)
            ->height(300);
    }


    public static function getDiscountedPrice($product_id)
    {
        $product    = Product::select('price', 'discount', 'category_id')->where('id', $product_id)->first();
        $category   = Category::select('discount')->where('id', $product->category_id)->first();

        if ($product->discount > 0)
            // 450 = 500 - (500 *10 / 100)
            $discountedPrice = $product->price  - ($product->price * $product->discount / 100);

        elseif ($category->discount > 0)
            $discountedPrice = $product->price  - ($product->price * $category->discount / 100);

        else
            $discountedPrice = 0;

        return $discountedPrice;
    }


    public static function getDiscountedAttributePrice($product_id, $size)
    {
        $productAttribute   = ProductAttribute::where(['size' => $size, 'product_id' => $product_id])->first();
        $product            = Product::select('discount', 'category_id')->where('id', $product_id)->first();
        $category           = Category::select('discount')->where('id', $product->category_id)->first();

        if ($product->discount > 0) {
            $finalPrice    = $productAttribute->price  - ($productAttribute->price * $product->discount / 100);
            $discount           = $productAttribute->price - $finalPrice;
        } elseif ($category->discount > 0) {
            $finalPrice    = $productAttribute->price  - ($productAttribute->price * $category->discount / 100);
            $discount           = $productAttribute->price - $finalPrice;
        } else {
            $finalPrice    = $productAttribute->price ;
            $discount           = 0.00;
        }

        return [
            'productPrice'      => $productAttribute['price'],
            'finalPrice'        => $finalPrice,
            'discount'          => $discount
        ];
    }


    public const fabricArray    = ['cotton', 'polyester', 'wool'];
    public const sleeveArray    = ['full_sleeve', 'half_sleeve', 'short_sleeve', 'sleeveless'];
    public const patternArray   = ['checked', 'plain', 'printed', 'self', 'solid'];
    public const fitArray       = ['regular', 'slim'];
    public const occasionArray  = ['casual', 'formal'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
