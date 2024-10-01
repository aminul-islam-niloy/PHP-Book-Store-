<?php

namespace Database\Factories;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Book::class;

    public function definition(): array
    {
        return [
            //seeding using fake data
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'isbn' => $this->faker->unique()->isbn13,
        ];
    }
}
