<?php

use App\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      Trainer::create([
         'name' => 'ahmed zaki',
         'email' => 'az@gmail.com',
         'spec' => 'web development',
         'img' => '1.png.',
      ]);

      Trainer::create([
         'name' => 'kareem fouad',
         'email' => 'km@gmail.com',
         'spec' => 'web development',
         'img' => '2.png',
      ]);

      Trainer::create([
         'name' => 'abdallah eid',
         'email' => 'ae@gmail.com',
         'spec' => 'mobile development',
         'img' => '3.png',
      ]);

      Trainer::create([
         'name' => 'mohamed mohsen',
         'email' => 'mm@gmail.com',
         'spec' => 'web development',
         'img' => '4.png',
      ]);

      Trainer::create([
         'name' => 'ahmed adel',
         'email' => 'aa@gmail.com',
         'spec' => 'engineering',
         'img' => '5.png',
      ]);

   }
}
