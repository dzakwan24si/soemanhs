<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_the_application_returns_a_successful_response_for_the_home_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
