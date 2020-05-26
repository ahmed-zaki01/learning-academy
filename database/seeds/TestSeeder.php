<?php

use App\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      for ($i = 0; $i < 10; $i++) {
         Test::create([
            'student_id' => rand(1, 50),
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti ut rerum ad iste est eligendi rem doloribus saepe.',
            'img' => "ts_$i.png",
            'created_at' => now(),
            'updated_at' => now(),
         ]);
      }
   }
}
