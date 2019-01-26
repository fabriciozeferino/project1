<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function tests_registers_successfully()
    {
        $payload = [
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => 'jhon123',
            'password_confirmation' => 'jhon123',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);
    }

    public function tests_requires_password_email_and_name()
    {
        $this->json('post', '/api/register')
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" =>
                        [
                        "email" => ["The email field is required."],
                        "password"
                            => ["The password field is required."]
                    ]
                ]
            );
    }

    public function testsRequirePasswordConfirmation()
    {
        $payload = [
            'name' => 'John',
            'email' => 'john@toptal.com',
            'password' => 'toptal123',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The given data was invalid.",
                    "errors" =>
                        [
                        "password"
                            => ["The password confirmation does not match."]
                    ]
                ]
            );
    }
}
