<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;


class AuthControllerTest extends TestCase
{


    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        // Создаем тестового пользователя
        $user = User::factory()->create([
            'login' => 'admin',
            'password' => bcrypt('password')
        ]);

        $response = $this->post(route('login'), [
            'login' => 'admin',
            'password' => 'password'
        ]);

        $response->assertRedirect(route('menu'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_incorrect_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123')
        ]);

        $response = $this->post(route('login'), [
            'login' => $user->login,
            'password' => 'wrong-password'
        ]);

        $response->assertRedirect()
                ->assertSessionHasErrors('login');
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_login_with_nonexistent_login()
    {
        $response = $this->post(route('login'), [
            'login' => 'nonexistent',
            'password' => 'password'
        ]);

        $response->assertRedirect()
                ->assertSessionHasErrors('login');
        $this->assertGuest();
    }

    /** @test */
    public function it_requires_login_and_password_fields()
    {
        $response = $this->post(route('login'), [
            // Пустые данные
        ]);

        $response->assertSessionHasErrors(['login', 'password']);
    }
}