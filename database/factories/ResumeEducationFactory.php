<?php

namespace Database\Factories;

use App\Models\EducationDegree;
use App\Models\Resume;
use App\Models\ResumeEducation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ResumeEducation>
 */
class ResumeEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateFrom = fake()->dateTimeBetween('-15 years', '-5 years');
        $dateTo = fake()->dateTimeBetween($dateFrom, 'now');

        return [
            'resume_id' => Resume::factory(),

            'institution' => fake()->company() . ' University',
            'faculty' => fake()->word(),
            'specialization' => fake()->jobTitle(),

            'degree_id' => EducationDegree::query()
                ->inRandomOrder()
                ->value('id'),

            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ];
    }
}
