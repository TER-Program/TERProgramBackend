<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerformanceGoals>
 */
class PerformanceGoalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher' => 'Kis Jani',
            'evaluator' => 'Jegy Ádám',
            'aspect_item' => '1',
            'score' => 90,
            'scored' => true
        ];
    }
}
