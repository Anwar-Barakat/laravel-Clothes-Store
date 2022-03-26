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

        foreach ($sections as $section) {
            if (is_null(Section::where('name->en', $section['en'])->where('name->ar', $section['ar'])->first()))
                Section::create(['name' => $section, 'status' => 1]);
        }
    }
}