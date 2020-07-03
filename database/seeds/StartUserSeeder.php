<?php

use Illuminate\Database\Seeder;

class StartUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'mar@gmail.com',
            'password' => '$2y$10$4R8fxbKNPHxD.p9rU2nlVOtN3kn51Fb1EVvjPfsYjowEaJ8Ksb0Dq'
        ]);

        DB::table('person')->insert([
            'role' => 1,
            'surname' => 'Баз',
            'name' => 'Админ',
            'phone' => 0,
        ]);
    }
}
