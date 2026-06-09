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
            [
                'name' => 'новый',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'просмотрен',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'отказано',
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
