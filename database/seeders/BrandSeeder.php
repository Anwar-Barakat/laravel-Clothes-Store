<?php
namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'en' => 'First Brand',
                'ar' => 'الشعار الأول',
            ],
            [
                'en' => 'Second Brand',
                'ar' => 'الشعار الثاني',
            ],
            [
                'en' => 'Third Brand',
                'ar' => 'الشعار الثالث',
            ],
            [
                'en' => 'Fourth Brand',
                'ar' => 'الشعار الرابع',
            ],
        ];

        foreach ($brands as $brand) {
            if (is_null(Brand::where('name->en', $brand['en'])->where('name->ar', $brand['ar'])->first()))
                Brand::create(['name' => $brand, 'status' => 1]);
        }
    }
}
