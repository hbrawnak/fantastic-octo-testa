<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register()
    {
        $response = $this->post(route('user.register'), [
            'name' => 'Habib',
            'email' => 'habib@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ])
            ->assertCreated();

        $this->assertDatabaseHas('users', ['name' => 'Habib']);
    }
}
