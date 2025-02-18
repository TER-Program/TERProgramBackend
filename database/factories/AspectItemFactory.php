<?php

namespace Database\Factories;

use App\Models\Aspect;
use App\Models\AspectItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AspectItem>
 */
class AspectItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AspectItem::class;

    public function definition(): array
    {
        return [
            'aspect' => Aspect::factory(), // Létrehoz egy kapcsolódó Aspect modellt
            'max_score' => 10, // Fix max pontszám
            'name' => 'Értékelési Kritérium', // Fix név
            'description' => 'Ez egy előre definiált leírás.', // Fix leírás
            'doc_required' => false, // Dokumentáció nem kötelező
        ];
    }
}
