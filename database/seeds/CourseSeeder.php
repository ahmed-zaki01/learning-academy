<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      for ($i = 1; $i <= 3; $i++) {
         for ($j = 1; $j <= 6; $j++) {
            Course::create([
               "cat_id" => "$i",
               "trainer_id" => rand(1, 5),
               "name" => "course num $j cat num $i",
               "price" => rand(1500, 8000),
               "short_desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora dolores maiores ex cum excepturi sed?",
               "desc" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa labore necessitatibus nemo at corrupti? Corrupti voluptates rerum laborum facere, id voluptas natus amet voluptate asperiores, dolorum nihil repellendus animi officiis?",
               "img" => "$i$j.png",
            ]);
         }
      }
   }
}
