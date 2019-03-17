<?php

use Illuminate\Database\Seeder;

use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Course::class, 1)->create();
    }
}
