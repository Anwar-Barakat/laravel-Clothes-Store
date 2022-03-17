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
        $sections = collect(Section::all()->modelKeys());
        $categoriesRecords = [
            [
                'parent_id'         => 0,
                'section_id'        => $sections->random(),
                'name'              => 'T-shirts',
                'discount'          => 0,
                'description'       => $faker->paragraph(),
                'url'               => 't-shirt',
                'meta_title'        => '',
                'meta_description'  => $faker->paragraph(),
                'meta_keywords'     => '',
                'status'            => 1,
            ],
            [
                'parent_id'         => 0,
                'section_id'        => $sections->random(),
                'name'              => 'Casual T-shirts',
                'discount'          => 0,
                'description'       => $faker->paragraph(),
                'url'               => 'casual-t-shirt',
                'meta_title'        => '',
                'meta_description'  => $faker->paragraph(),
                'meta_keywords'     => '',
                'status'            => 1,
            ],
        ];
        Category::insert($categoriesRecords);
    }
}
