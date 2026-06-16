<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Resume;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()
            ->count(20)
            ->create();

        Resume::factory()
            ->count(30)
            ->create();

        Vacancy::factory()
            ->count(50)
            ->create();
    }
}
