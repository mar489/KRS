<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'qwe@asd.ru',
            'password' => '$2y$12$fpxqJW5tH9QbRtG4zgHeQeNera8n/oP9B9i0zranTbWjsoLv5DLTO'
        ]);

        DB::table('person')->insert([
            'role' => 1,
            'surname' => 'Базовый',
            'name' => 'Админ',
            'phone' => 0,
        ]);
    }
}
