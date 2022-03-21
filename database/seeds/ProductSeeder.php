<?php

use App\Models\Product;
use App\Models\Section;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fabric = collect(Product::fabricArray);
        $sleeve = Product::sleeveArray;
        $sections                   = Section::with('categories')->get();
        dd($sections[0]->categories[0]->id);
        $productRecord   = [
            [
                'section_id'        => $sections[0],
                'category_id'       => $sections[0]->categories[0]->id,
                'name'              => $this->faker->name,
                'code'              => $this->faker->numerify('Anw#####'),
                'color'             => $this->faker->colorName,
                'discount'          => random_int(10, 100),
                'price'             => random_int(10, 1000),
                'weight'            => random_int(10, 100),
                'description'       => $this->faker->paragraph,
                'wash_care'         => $this->faker->paragraph,
                'fabric'            => $fabric[random_int(0, 2)],
                'fabric'            => $sleeve[random_int(0, 3)],
                'status'            => rand(0, 1),
            ],
        ];
    }
}