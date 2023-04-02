<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'type_id' => Type::all()->random()->id,
            'name'    => ucfirst($this->faker->words(2, true)),
            'content' => $this->faker->realText(2000),
        ];
    }
}
