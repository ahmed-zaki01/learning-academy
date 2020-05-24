<?php

use App\Cat;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      Cat::create([
         'name' => 'web development',
      ]);

      Cat::create([
         'name' => 'medical',
      ]);

      Cat::create([
         'name' => 'english',
      ]);
   }
}
