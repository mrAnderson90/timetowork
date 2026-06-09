<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experience_levels')->insert([
            [
                'name' => 'без опыта',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'менее 1 года',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '1-3 года',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '3-5 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'более 5 лет',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
