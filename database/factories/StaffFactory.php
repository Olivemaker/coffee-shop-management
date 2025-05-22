<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Staff;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(Staff::class, function (Faker $faker) {
            return [
                'full_name' => $faker->name,
                'number' => '+7' . $faker->numerify('##########'),
                'address' => $faker->address,
                'bday' => $faker->date(),
                'color' => $faker->hexColor
            ];
        });
    }
}
