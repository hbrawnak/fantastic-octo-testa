<?php

namespace Tests\Feature\Auth;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_login()
    {
        $user = User::factory()->create();

        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])->assertOk();

        $this->assertArrayHasKey('token', $response->json());
    }


    public function test_if_email_does_not_exist_should_return_error()
    {
        $this->postJson(route('user.login'), [
            'email' => 'habib@gmail.com',
            'password' => 'password'
        ])->assertUnauthorized();
    }


    public function test_if_password_is_incorrect_should_return_error()
    {
        $user = User::factory()->create();
        $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'test'
        ])->assertUnauthorized();
    }
}
