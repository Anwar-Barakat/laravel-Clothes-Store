<?php

namespace Database\Seeders;

use App\Models\Country;
use Database\Seeders\CountrySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AdminSeeder::class,
            // SectionSeeder::class,
            // BrandSeeder::class,
            // BannerSeeder::class,
            // CategorySeeder::class,
            // CountrySeeder::class,
            CouponSeeder::class
        ]);
    }
}