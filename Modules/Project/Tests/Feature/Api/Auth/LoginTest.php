<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_requires_email_and_login()
    {
        $this->json('POST', 'api/login')
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

    public function test_user_can_logins_successfully()
    {
        $user = factory(User::class)->create([
            'email' => 'testlogin@user.com',
            'password' => bcrypt('toptal123'),
        ]);

        $payload = ['email' => 'testlogin@user.com', 'password' => 'toptal123'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
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
}
