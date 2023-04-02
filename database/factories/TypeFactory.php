<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = ucfirst($this->faker->unique()->word);

        return [
            'slug' => Str::slug($name),
            'name' => $name,
        ];
    }
}
