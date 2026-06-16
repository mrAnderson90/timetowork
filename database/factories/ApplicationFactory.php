<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Resume;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vacancy_id' => Vacancy::factory(),

            'resume_id' => Resume::factory(),

            'cover_letter' => fake()->paragraphs(2, true),

            'application_status_id' => ApplicationStatus::query()
                ->inRandomOrder()
                ->value('id'),
        ];
    }
}
