<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumeVisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resume_visibilities')->insert([
            [
                'name' => 'опубликовано',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'скрыто',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
