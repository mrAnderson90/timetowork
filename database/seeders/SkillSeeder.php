<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [ 'name' => 'PHP', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'JavaScript', 'created_at' => now(), 'updated_at' => now() ],
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MySQL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Docker',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Python',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
