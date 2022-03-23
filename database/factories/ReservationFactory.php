<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $bookIds = Book::pluck('id')->toArray();
        $faker = $this->faker;

        return [
            'email' => $faker->email,
            'book_id' => $faker->randomElement($bookIds),
            'quantity' => $faker->numberBetween(1, 10),
        ];
    }
}
