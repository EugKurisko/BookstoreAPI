<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
        ];
    }
}
