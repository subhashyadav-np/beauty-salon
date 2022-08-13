<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('front_banners')->insert([
            [
                'small_title' => 'Or magic begins here!',
                'main_title' => 'For hair that will attract',
                'paragraph' => 'After owning two successful beauty locations they decided
                to their passion to the small town of documentary to
                convince audience to buy into any one.',
                'banner' => 'home_banner_cWRLhMcVyiEEpVF.jpg',
            ],
            [
                'small_title' => 'Or magic begins here!',
                'main_title' => 'For hair that will attract',
                'paragraph' => 'After owning two successful beauty locations they decided
                to their passion to the small town of documentary to
                convince audience to buy into any one.',
                'banner' => 'home_banner_QR803W5nISmWXGk.jpg',
            ],
            [
                'small_title' => 'Or magic begins here!',
                'main_title' => 'For hair that will attract',
                'paragraph' => 'After owning two successful beauty locations they decided
                to their passion to the small town of documentary to
                convince audience to buy into any one.',
                'banner' => 'home_banner_tuyrj2X62qUtNUe.jpg',
            ],
        ]);
    }
}
