<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * @test
     * Test login
     */
    public function testLogin()
    {
        $email = $this->faker->email();

        //Create user
        \App\User::create([
            'name' => $this->faker->firstName(),
            'email' => $email,
            'password' => bcrypt('secret1234')
        ]);

        //attempt login
        $response = $this->json('POST', asset('/api/auth/authenticate/'), [
            'email' => $email,
            'password' => 'secret1234',
        ]);
        
        //Assert it was successful and a token was received
        $response->assertStatus(200);

        $this->assertArrayHasKey('access_token', $response->json());
    }
}
