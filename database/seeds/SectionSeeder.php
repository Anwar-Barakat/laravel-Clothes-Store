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
                'en' => 'Children',
                'ar' => 'الأطفال',
            ],
            [
                'en' => 'Men',
                'ar' => 'الرجال',
            ],
            [
                'en' => 'Women',
                'ar' => 'النساء',
            ],
        ];

        foreach ($sections as $section) {
            if (is_null(Section::where('name->en', $section['en'])->where('name->ar', $section['ar'])->first()))
                Section::create(['name' => $section, 'status' => 1]);
        }
    }
}