<?php

use App\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContent::create([
            'name' => 'banner',
            'content' => json_encode([
                'title' => 'Every student yearns to learn',
                'subtitle' => 'Making Your World Better',
                'desc' => "Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding man",
                'img' => 'banner_img.png',
            ]),
        ]);
    }
}
