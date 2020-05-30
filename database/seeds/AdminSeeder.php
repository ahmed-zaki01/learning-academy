<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'ahmed_zaki',
            'email' => 'ahmed@etrain.com',
            'password' => bcrypt(123456),
        ]);
    }
}
