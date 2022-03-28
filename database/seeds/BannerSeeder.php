<?php

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->delete();

        $banners = [
            [
                'en' => 'First Banner',
                'ar' => 'الراية الأول',
            ],
            [
                'en' => 'Second Banner',
                'ar' => 'الراية الثاني',
            ],
            [
                'en' => 'Third Banner',
                'ar' => 'الراية الثالث',
            ],
        ];

        foreach ($banners as $banner) {
            if (is_null(Banner::where('title->en', $banner['en'])->where('title->ar', $banner['ar'])->first()))
                Banner::create([
                    'title' => $banner,
                    'link'      => '',
                    'alternative'   => '',
                    'status' => 1
                ]);
        }
    }
}