<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FinancialRecord;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialRecord>
 */
class FinancialRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(FinancialRecord::class, function (Faker $faker) {
            return [
                'type' => $faker->randomElement(['выручка', 'такси', 'ЗП', 'поставка']),
                'payment_method' => $faker->randomElement(['наличные', 'карта']),
                'amount' => $faker->randomFloat(2, 0, 10000),
                'date' => $faker->date(),
            ];
        });
    }
}
