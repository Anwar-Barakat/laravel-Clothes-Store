<?php
namespace Database\Seeders;

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
                'section_id'        => Section::where('name->en', 'Children')->first()->id,
                'name'              => 'T-Shirts',
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => 't-shirts',
                'meta_title'        => '',
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => '',
                'status'            => 1,
            ],

            [
                'parent_id'         => 0,
                'section_id'        => Section::where('name->en', 'Men')->first()->id,
                'name'              => 'T-Shirts',
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => 't-shirts',
                'meta_title'        => '',
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => '',
                'status'            => 1,
            ],
            [
                'parent_id'         => 0,
                'section_id'        => Section::where('name->en', 'Women')->first()->id,
                'name'              => 'Dresses',
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => 'dresses',
                'meta_title'        => '',
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => '',
                'status'            => 1,
            ],

        ];
        Category::insert($categoriesRecords);
    }
}
