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
            SupercategoryTableSeeder::class,
            SizesTableSeeder::class,
            CategoryTableSeeder::class,
            StartUserSeeder::class,
            OrderStatusTableSeeder::class,
        ]);
    }
}
