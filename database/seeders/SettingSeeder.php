<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        $settings = [
            [
                'email'             => 'anStore01@gmail.com',
                'mobile'            => '0123123123',
                'location'          => 'Damascus,Syria',
                'min_cart_value'    => '5',
                'max_cart_value'    => '650',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];

        Setting::insert($settings);
    }
}