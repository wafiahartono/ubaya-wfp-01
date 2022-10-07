<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => ucwords(implode(' ', fake()->words(rand(1, 3))))
        ];
    }
}
