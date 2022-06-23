<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class CmsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmsRecords = [
            [
                'title'             => 'About Us',
                'description'       => 'Content is coming soon',
                'url'               => 'about-us',
                'meta_title'        => 'About Us',
                'meta_description'  => 'About Clothes Store',
                'meta_keywords'     => 'about us, about clothes store website',
            ],
            [
                'title'             => 'Privacy Policy',
                'description'       => 'Content is coming soon',
                'url'               => 'privacy-policy',
                'meta_title'        => 'Privacy Policy',
                'meta_description'  => 'About Privacy Policy of clothes store',
                'meta_keywords'     => 'privacy policy,privacy policy of clothes store',
            ],
        ];

        foreach ($cmsRecords as $cms) {
            if (is_null(CmsPage::where('title', $cms['title'])->first())) {
                CmsPage::create([
                    'title'                 => $cms['title'],
                    'description'           => $cms['description'],
                    'url'                   => $cms['url'],
                    'meta_title'            => $cms['meta_title'],
                    'meta_description'      => $cms['meta_description'],
                    'meta_keywords'         => $cms['meta_keywords'],
                    'status'                => 1,
                    'status' => 1
                ]);
            }
        }
    }
}