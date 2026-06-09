<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vacancy_statuses')->insert([
            [
                'name' => 'черновик',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'активно',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'в архиве',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'принято',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'приглашён',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
