<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CatSeeder::class,
            TrainerSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
            CourseStudentSeeder::class,
            TestSeeder::class,
            SettingSeeder::class,
            SiteContentSeeder::class,
        ]);
    }
}
