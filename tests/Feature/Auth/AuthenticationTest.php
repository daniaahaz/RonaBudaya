<?php

namespace Tests\Feature\Auth;

use App\Models\UserInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = UserInfo::create([
            'UserName' => 'Test User',
            'UserEmail' => 'test@example.com',
            'UserPassword' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->UserEmail,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        UserInfo::create([
            'UserName' => 'Test User',
            'UserEmail' => 'test@example.com',
            'UserPassword' => Hash::make('password'),
        ]);

        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = UserInfo::create([
            'UserName' => 'Test User',
            'UserEmail' => 'test@example.com',
            'UserPassword' => Hash::make('password'),
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
