<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education_degrees')->insert([
            [
                'name' => 'бакалавр',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'магистр',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'специалист',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'среднее специальное',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'доктор наук',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
