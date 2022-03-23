<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $authorIds = Author::pluck('id')->toArray();
        $faker = $this->faker;

        return [
            'author_id' => $faker->boolean() ? $faker->randomElement($authorIds) : null,
            'title' => $faker->title . ' ' . $faker->colorName,
            'short_description' => $faker->text(50),
            'amount' => $faker->randomNumber([100]),
        ];
    }
}
