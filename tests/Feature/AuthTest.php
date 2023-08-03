<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;


class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $user = User::factory()->create(); 
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/Noticia');
    }

    public function test_login_with_credentials(){
        $user = User::factory()->create([
            'password' => bcrypt($password = '12345678'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/Noticia');
        $this->assertAuthenticatedAs($user); // chequea el usuario
    }

    public function test_login_with_incorrect_password(){
        $user = User::factory()->create([
            'password' => bcrypt($password = '12345678'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '11111',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest(); // sigue como invitado
    }
}
