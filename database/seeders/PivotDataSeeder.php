<?php

namespace Database\Seeders;

use App\Models\Resume;
use App\Models\Skill;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PivotDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resume::all()->each(function ($resume) {
            $resume->skills()->attach(
                Skill::query()
                    ->inRandomOrder()
                    ->limit(rand(3, 8))
                    ->pluck('id')
            );
        });

        Vacancy::all()->each(function ($vacancy) {
            $vacancy->skills()->attach(
                Skill::query()
                    ->inRandomOrder()
                    ->limit(rand(3, 5))
                    ->pluck('id')
            );

            $vacancy->tags()->attach(
                Skill::query()
                    ->inRandomOrder()
                    ->limit(rand(1, 5))
                    ->pluck('id')
            );
        });
    }
}
