<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = Country::pluck('id');

        return [
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'country_id' => $this->faker->unique()->randomElement($countries),
        ];
    }
}
