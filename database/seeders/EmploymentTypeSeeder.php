<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employment_types')->insert([
            [
                'name' => 'полный день',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'частичная занятость',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'удаленная работа',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'гибридный график',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'контракт',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'стажировка',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
