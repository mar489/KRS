<?php

use Illuminate\Database\Seeder;

class SupercategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supercategory')->insert([
            'supercategory_name' => 'Для мужчин',
        ]);
        DB::table('supercategory')->insert([
            'supercategory_name' => 'Для женщин',
        ]);
        DB::table('supercategory')->insert([
            'supercategory_name' => 'Детская обувь',
        ]);
        DB::table('supercategory')->insert([
            'supercategory_name' => 'Для мам и малышей',
        ]);
        DB::table('supercategory')->insert([
            'supercategory_name' => 'Аксессуары',
        ]);
        DB::table('supercategory')->insert([
            'supercategory_name' => 'Уход за обувью',
        ]);
    }
}
