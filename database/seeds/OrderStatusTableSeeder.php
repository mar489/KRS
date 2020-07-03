<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Ожидает подтверждения', 'Подтверждён', 'Отклонён', 'Завершён'];

        foreach ($statuses as $status){
            DB::table('order_status')->insert([
                'status_name' => $status,
            ]);
        }
    }
}
