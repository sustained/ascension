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
        DB::table('words')->insert([
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'be',
                'target' => 'vara',
                'data' => json_encode([
                    'pos_type' => 'verb',
                    'pos_form' => 'infinitive'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'I',
                'target' => 'jag',
                'data' => json_encode([
                    'pos_type' => 'pronoun',
                    'pos_form' => 'subject'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'I am ...',
                'target' => 'jag är ...',
                'data' => json_encode([
                    'pos_type' => 'sentence',
                    'pos_form' => 'fragment'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'you',
                'target' => 'du',
                'data' => json_encode([
                    'pos_type' => 'pronoun',
                    'pos_form' => 'subject'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'you are ...',
                'target' => 'du är ...',
                'data' => json_encode([
                    'pos_type' => 'sentence',
                    'pos_form' => 'fragment'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'a, an',
                'target' => 'en',
                'data' => json_encode([
                    'pos_type' => 'determiner',
                    'pos_form' => 'article',
                    'definite' => false,
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'a, an',
                'target' => 'ett',
                'data' => json_encode([
                    'pos_type' => 'determiner',
                    'pos_form' => 'article',
                    'definite' => false,
                    'gender' => 'neuter'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'boy',
                'target' => 'pojke',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'girl',
                'target' => 'flicka',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'man',
                'target' => 'man',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'woman',
                'target' => 'kvinna',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'he',
                'target' => 'han',
                'data' => json_encode([
                    'pos_type' => 'pronoun',
                    'pos_form' => 'subject'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'she',
                'target' => 'hon',
                'data' => json_encode([
                    'pos_type' => 'pronoun',
                    'pos_form' => 'subject'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'eat',
                'target' => 'äta',
                'data' => json_encode([
                    'pos_type' => 'verb',
                    'pos_form' => 'infinitive'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'drink',
                'target' => 'dricka',
                'data' => json_encode([
                    'pos_type' => 'verb',
                    'pos_form' => 'infinitive'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'jag äter ...',
                'target' => 'I eat/am eating ...',
                'data' => json_encode([
                    'pos_type' => 'sentence',
                    'pos_form' => 'fragment'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'jag dricker ...',
                'target' => 'I drink/am drinking ...',
                'data' => json_encode([
                    'pos_type' => 'sentence',
                    'pos_form' => 'fragment'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'apple',
                'target' => 'äpple',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'neuter'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'cheese',
                'target' => 'ost',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'water',
                'target' => 'vatten',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'neuter'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level_id' => 1,
                'course_id' => 1,
                'source' => 'juice',
                'target' => 'saft',
                'data' => json_encode([
                    'pos_type' => 'noun',
                    'pos_form' => 'indefinite',
                    'gender' => 'common'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
