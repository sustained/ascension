<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($courseId = 1; $courseId <= 2; $courseId++) {
            $json = File::get("database/seeds/json/courses/" . $courseId . ".json");
            $data = json_decode($json, true);

            $insert = [];

            foreach ($data["levels"] as $_ => $level) {
                foreach ($level['words'] as $word) {
                    array_push($insert, [
                        'level_id' => $level['id'],
                        'course_id' => $courseId,
                        'source' => $word['source'],
                        'target' => $word['target'],
                        'data' => json_encode($word['data']),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

            DB::table('words')->insert($insert);
        }
    }
}
