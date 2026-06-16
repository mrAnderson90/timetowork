<?php

namespace Database\Factories;

use App\Models\Resume;
use App\Models\ResumePhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ResumePhoto>
 */
class ResumePhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resume_id' => Resume::factory(),

            'path' => 'resumes/' . fake()->uuid() . '.jpg',

            'is_main' => false,
        ];
    }

    public function main(): static
    {
        return $this->state(fn () => [
            'is_main' => true,
        ]);
    }
}
