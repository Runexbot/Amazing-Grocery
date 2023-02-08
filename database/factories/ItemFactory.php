<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->unique()->word(),
            'item_desc' => $this->faker->sentence(6),
            'price' => $this->faker->randomNumber(5),
            'image' => "https://picsum.photos/seed/".$this->faker->unique()->word."/640/480/"
        ];
    }
}
