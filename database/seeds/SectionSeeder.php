<?php

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'en' => 'Men',
                'ar' => 'الرجال',
            ],
            [
                'en' => 'Woman',
                'ar' => 'النساء',
            ],
            [
                'en' => 'Children',
                'ar' => 'الأطفال',
            ],
        ];

        foreach ($sections as $city) {
            if (is_null(Section::where('name->en', $city['en'])->where('name->ar', $city['ar'])->first()))
                Section::create(['name' => $city, 'status' => 1]);
        }
    }
}