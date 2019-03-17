<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create([
            'name' => 'sustained',
            'email' => 'me@sustained.name',
            'password' => bcrypt('password')
        ]);
    }
}
