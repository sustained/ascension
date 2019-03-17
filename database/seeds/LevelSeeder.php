<?php

use Illuminate\Database\Seeder;

use App\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Level::class, 1)->create(['course_id' => 1]);
    }
}
