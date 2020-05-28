<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Etrain',
            'logo' => 'logo.png',
            'alt_logo' => 'alt-logo.png',
            'favicon' => 'favicon.png',
            'email' => 'info@etrain.com',
            'phone' => '+2 36 265 (8060)',
            'city' => 'Cairo',
            'address' => 'Mansour Street, Helwan',
            'work_hours' => 'SUN-THU From 10 AM to 6 PM',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d873691.1898198937!2d150.744!3d-31.197!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1590626889429!5m2!1sen!2sus" width="1000" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'fb' => 'https://www.facebook.com/',
            'tw' => 'https://twitter.com/explore',
            'insta' => 'https://www.instagram.com/?hl=en'
        ]);
    }
}
