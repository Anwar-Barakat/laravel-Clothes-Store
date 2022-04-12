<?php
namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'name'              => 'Anwar admin',
                'email'             => 'brkatanwar0@admin.com',
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('adminadmin'),
                'type'              => 'admin',
                'mobile'            => '+963' . random_int(100000000, 999999999),
                'image'             => '',
                'status'            => 1
            ],
            [
                'name'              => 'First admin',
                'email'             => 'admin01@admin.com',
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('adminadmin'),
                'type'              => 'admin',
                'mobile'            => '+963' . random_int(100000000, 999999999),
                'image'             => '',
                'status'            => 1
            ],
            [
                'name'              => 'Second Admin',
                'email'             => 'admin02@admin.com',
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('adminadmin'),
                'type'              => 'admin',
                'mobile'            => '+963' . random_int(100000000, 999999999),
                'image'             => '',
                'status'            => 1
            ],
            [
                'name'              => 'subadmin',
                'email'             => 'subadmin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('adminadmin'),
                'type'              => 'subadmin',
                'mobile'            => '+963' . random_int(100000000, 999999999),
                'image'             => '',
                'status'            => 1
            ],

        ];
        Admin::insert($adminRecords);
    }
}
