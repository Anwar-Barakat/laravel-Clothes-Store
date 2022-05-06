<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();

        $faker      = Factory::create();
        $userIds        = collect(User::all()->modelKeys());
        $productIds     = collect(Product::all()->modelKeys());

        $ratingRecords  = [
            [
                'user_id'       => $userIds->random(),
                'product_id'    => $productIds->random(),
                'review'        => $faker->paragraph(),
                'rating'        => 4,
                'status'        => 1,
            ],
            [
                'user_id'       => $userIds->random(),
                'product_id'    => $productIds->random(),
                'review'        => $faker->paragraph(),
                'rating'        => 3,
                'status'        => 1,
            ],
            [
                'user_id'       => $userIds->random(),
                'product_id'    => $productIds->random(),
                'review'        => $faker->paragraph(),
                'rating'        => 5,
                'status'        => 1,
            ],
        ];

        Rating::insert($ratingRecords);
    }
}