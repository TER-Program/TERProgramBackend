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
            'aspect' => Aspect::factory(),
            'max_score' => 10,
            'name' => 'Értékelési Kritérium',
            'description' => 'Ez egy előre definiált leírás.',
            'doc_required' => false,
        ];
    }
}
