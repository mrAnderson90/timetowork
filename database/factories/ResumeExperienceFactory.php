<?php

namespace Database\Factories;

use App\Models\Resume;
use App\Models\ResumeExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ResumeExperience>
 */
class ResumeExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isCurrent = fake()->boolean(25);

        $dateFrom = fake()->dateTimeBetween('-10 years', '-1 year');

        return [
            'resume_id' => Resume::factory(),

            'company_name' => fake()->company(),
            'position' => fake()->jobTitle(),

            'description' => fake()->paragraph(),

            'date_from' => $dateFrom,

            'date_to' => $isCurrent
                ? null
                : fake()->dateTimeBetween($dateFrom, 'now'),

            'is_current' => $isCurrent,
        ];
    }
}
