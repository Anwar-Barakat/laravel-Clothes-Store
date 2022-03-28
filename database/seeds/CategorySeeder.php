<?php

use App\Models\Category;
use App\Models\Section;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $faker      = Factory::create();
        $categoriesRecords = [
            [
                'parent_id'         => 0,
                'section_id'        => Section::where('name->en', 'Electronics')->first()->id,
                'name'              => 'Asus',
                'discount'          => 0,
                'description'       => $faker->paragraph(),
                'url'               => 'asus',
                'meta_title'        => '',
                'meta_description'  => $faker->paragraph(),
                'meta_keywords'     => '',
                'status'            => rand(0, 1),
            ],
            [
                'parent_id'         => 0,
                'section_id'        => Section::where('name->en', 'Men Clothes')->first()->id,
                'name'              => 'T-Shirts',
                'discount'          => 0,
                'description'       => $faker->paragraph(),
                'url'               => 't-shirts',
                'meta_title'        => '',
                'meta_description'  => $faker->paragraph(),
                'meta_keywords'     => '',
                'status'            => rand(0, 1),
            ],
            [
                'parent_id'         => 0,
                'section_id'        => Section::where('name->en', 'Woman Clothes')->first()->id,
                'name'              => 'Dresses',
                'discount'          => 0,
                'description'       => $faker->paragraph(),
                'url'               => 'dresses',
                'meta_title'        => '',
                'meta_description'  => $faker->paragraph(),
                'meta_keywords'     => '',
                'status'            => rand(0, 1),
            ],
        ];
        Category::insert($categoriesRecords);
    }
}