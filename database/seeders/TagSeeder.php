<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'name' => 'Junior',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Middle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Senior',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Срочно',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Удаленная работа',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Переезд',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Startup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
