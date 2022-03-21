<?php

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productData = [];
        $productsId = collect(Product::all()->modelKeys());
        $products                   = collect(Product::all());
        foreach ($products as $product) {
            $productData = $product;
        }

        $productAttributesRecords   = [
            [
                'product_id'        => $productsId->random(),
                'size'              => 'small',
                'price'             => random_int(10, 1000),
                'stock'             => random_int(10, 100),
                'sku'               => $productData->code . '-s',
                'status'            => rand(0, 1),
            ],
            [
                'product_id'        => $productsId->random(),
                'size'              => 'medium',
                'price'             => random_int(10, 1000),
                'stock'             => random_int(10, 100),
                'sku'               => $productData->code . '-m',
                'status'            => rand(0, 1),
            ],
            [
                'product_id'        => $productsId->random(),
                'size'              => 'large',
                'price'             => random_int(10, 1000),
                'stock'             => random_int(10, 100),
                'sku'               => $productData->code . '-L',
                'status'            => rand(0, 1),
            ]
        ];

        ProductAttribute::insert($productAttributesRecords);
    }
}