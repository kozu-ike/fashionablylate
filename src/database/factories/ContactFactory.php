<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'detail' => $this->faker->sentence,
            'category_id' => $this->faker->numberBetween(1, 5), // categoriesテーブルのIDをランダムに割り当て
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
