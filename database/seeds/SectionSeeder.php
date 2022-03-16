<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionsRecords = [
            [
                'name'      => 'Men',
                'status'    => 1
            ],
            [
                'name'      => 'Women',
                'status'    => 1
            ],
            [
                'name'      => 'Children',
                'status'    => 1
            ],
        ];
        Section::insert($sectionsRecords);
    }
}
