<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register-aluno', [
            'nome' => 'Test User',
            'nome_social' => 'test@example.com',
            'cpf' => '12345678910',
            'data_nascimento' => '1990-01-01',
            'estado' => 'SP',
            'cidade' => 'São Paulo',
            'password' => 'password',
            'password_confirmation' => 'password',

        ]);

        $response->assertStatus(302);
    }
}
