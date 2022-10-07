<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'nrp' => fake()->numerify('1604190##'),
            'name' => fake()->name()
        ];
    }
}
