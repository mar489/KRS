<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supercategories = [1, 2, 3, 4, 5, 6];
        $categories = [
            ['Броги', 'Ворк бутс', "Гриндерсы", "Кроссовки", "Лоферы","Пантолеты","Тимберленды","Хайкеры"],
            [ "Балетки", "Босоножки", "Ботильоны","Ботфорты","Лабутены","Лодочки","Сапоги-чулки","Стилеты","Спортивная"],
            ['Полуботинки', 'Сандалии', "Спортивная обувь", "Сноубутсы", "Сланцы","Туфли"],
            ['Косметика и моющие средства',"Пинетки", "Салфетки"],
            ['Головные уборы', "Перчатки и шарфы","Ремни и носки", "Сумки и зонты" ],
            ['Крема и щетки', "	Краски и Полироли","Пропитки", "Спреи для обуви" ]
        ];

        foreach ($supercategories as $s_id){
            foreach ($categories[$s_id-1] as $item){
                DB::table('category')->insert([
                    'supercategory_id' => $s_id,
                    'category_name' => $item,
                ]);
            }
        }
    }
}
