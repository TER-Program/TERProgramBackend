<?php

namespace Database\Factories;

use App\Models\Aspect;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aspect>
 */
class AspectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Aspect::class;

    public function definition(): array
    {
        return [
            'name' => 'Alapértelmezett Aspektus', // Fix név
        ];
    }
}
