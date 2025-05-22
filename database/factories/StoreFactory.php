<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(Store::class, function (Faker $faker) {
        return [
            'name' => $faker->word,
            'current_quantity' => $faker->numberBetween(0, 1000),
            'unit_measure' => $faker->randomElement(['кг', 'шт']),
        ];
    });
    }
}
