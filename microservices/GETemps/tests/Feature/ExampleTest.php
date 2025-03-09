<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Désactiver les middlewares pour les tests
        $this->withoutMiddleware();
    }

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/listetemp');

        $response->assertStatus(200);
    }
}
