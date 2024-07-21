<?php
namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_country()
    {
        $response = $this->post('/api/countries', [
            'name' => 'New Country',
            'planned_weight' => 1000,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('countries', ['name' => 'New Country']);
    }

    /** @test */
    public function it_can_fetch_countries()
    {
        Country::factory()->create(['name' => 'Existing Country']);

        $response = $this->get('/api/countries');

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Existing Country']);
    }
}
