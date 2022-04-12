<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couponRecords = [
            [
                'option'            => '',
                'code'              => '',
                'categories'        => '',
                'users'             => '',
                'type'              => '',
                'amount_type'       => '',
                'amount'            => '',
                'expiration_date'   => '',
                'status'            => '',
            ]
        ];
    }
}
