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
        DB::table('sections')->delete();
        $section = new Section;
        $section->setTranslation('name', 'en', 'Men')
            ->setTranslation('name', 'ar', 'الرجال');
        $section->status = 1;
        $section->save();

        $section = new Section;
        $section->setTranslation('name', 'en', 'Woman')
            ->setTranslation('name', 'ar', 'النساء');
        $section->status = 1;
        $section->save();

        $section = new Section;
        $section->setTranslation('name', 'en', 'Children')
            ->setTranslation('name', 'ar', 'الأطفال');
        $section->status = 1;
        $section->save();
    }
}
