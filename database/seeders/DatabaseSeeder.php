<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Country;
use App\Models\Mining;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $countries = Country::COUNTRIES;
        collect( $countries )->each( function ( $country ) {
            Country::create( $country );
        } );

        $companies = Company::factory( count( $countries) )->create();

        Mining::factory( count( $companies) )->create();
    }
}
