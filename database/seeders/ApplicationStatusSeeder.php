<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application_statuses')->insert([
            [ 'name' => 'Новый', 'created_at' => now(), 'updated_at' => now()],
            [ 'name' => 'На рассмотрении',  'created_at' => now(),  'updated_at' => now() ],
            [ 'name' => 'Приглашение', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'Отказ',  'created_at' => now(),  'updated_at' => now() ],
        ]);
    }
}
