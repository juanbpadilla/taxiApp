<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_user_can_register()
    {
        $userData = [
            'name' => 'John Doe',
            'lastname' => 'Smith',
            'sex' => 'male',
            'phone' => '1234567890',
            'email' => 'john@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123', // Suponiendo que necesitas una confirmación
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertStatus(302); 
        $response->assertRedirect(route('dashboard')); // Suponiendo que rediriges al dashboard después del registro.

        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

}
