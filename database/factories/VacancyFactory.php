<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\EmploymentType;
use App\Models\ExperienceLevel;
use App\Models\Vacancy;
use App\Models\VacancyCategory;
use App\Models\VacancyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::query()
                ->inRandomOrder()
                ->value('id'),

            'vacancy_category_id' => VacancyCategory::query()
                ->inRandomOrder()
                ->value('id'),

            'title' => fake()->jobTitle(),

            'description' => fake()->paragraphs(4, true),

            'salary_from' => fake()->numberBetween(1000, 5000),

            'salary_to' => fake()->numberBetween(5000, 10000),

            'city' => fake()->city(),

            'employment_type_id' => EmploymentType::query()
                ->inRandomOrder()
                ->value('id'),

            'experience_level_id' => ExperienceLevel::query()
                ->inRandomOrder()
                ->value('id'),

            'vacancy_status_id' => VacancyStatus::query()
                ->inRandomOrder()
                ->value('id'),

            'published_at' => now(),
        ];
    }
}
