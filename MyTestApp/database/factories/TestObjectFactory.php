<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestObject>
 */
class TestObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'count' => $this->faker->numberBetween(1,15),
            'description' => $this->faker->text(191),
        ];
    }
}
