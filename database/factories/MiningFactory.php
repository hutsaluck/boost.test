<?php

namespace Database\Factories;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mining>
 */
class MiningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companies = Company::pluck('id');
        $startDate = Carbon::now()->subMonths(6);
        $endDate = Carbon::now();

        return [
            'company_id' => $this->faker->randomElement($companies),
            'date' => $this->faker->dateTimeBetween($startDate, $endDate),
            'weight' => $this->faker->randomFloat(2, 0.1, 10000),
        ];
    }
}
