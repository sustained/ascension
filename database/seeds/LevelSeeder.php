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
        // factory(\App\Level::class, 1)->create(['course_id' => 1]);

        for ($courseId = 1; $courseId <= 4; $courseId++) {
            $json = File::get("database/seeds/json/courses/" . $courseId . ".json");
            $data = json_decode($json, true);

            foreach ($data["levels"] as $_ => $level) {
                factory(\App\Level::class, 1)->create([
                    'id' => $level['id'],
                    'course_id' => $courseId,
                    'title' => $level['title']
                ]);
            }
        }
    }
}
