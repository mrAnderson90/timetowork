<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            EmploymentTypeSeeder::class,
            ResumeVisibilitySeeder::class,
            EducationDegreeSeeder::class,
            VacancyStatusSeeder::class,
            ApplicationStatusSeeder::class,
            ExperienceLevelSeeder::class,
            VacancyCategorySeeder::class,
            SkillSeeder::class,
            TagSeeder::class,
        ]);
    }
}
