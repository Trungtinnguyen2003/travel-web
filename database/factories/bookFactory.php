<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\book; // Lưu ý: Tên model nên viết hoa chữ cái đầu
use Faker\Generator as Faker;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'location' => $this->faker->city . ', ' . $this->faker->country,
            'guests' => $this->faker->numberBetween(1, 10),
            'arrival' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'leaving' => $this->faker->dateTimeBetween('+2 days', '+10 days')->format('Y-m-d'),
        ];
    }
}
