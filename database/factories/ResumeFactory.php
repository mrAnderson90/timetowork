<?php

namespace Database\Factories;

use App\Models\EmploymentType;
use App\Models\Resume;
use App\Models\ResumeVisibility;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->applicant(),

            'title' => fake()->jobTitle(),
            'about' => fake()->paragraphs(3, true),

            'desired_salary' => fake()->numberBetween(1000, 10000),

            'city' => fake()->city(),

            'employment_type_id' => EmploymentType::query()->inRandomOrder()->value('id'),

            'resume_visibility_id' => ResumeVisibility::query()
                ->inRandomOrder()
                ->value('id'),
        ];
    }
}
