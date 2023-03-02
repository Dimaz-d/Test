<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_generate_token_incorrect_email()
    {
        $response = $this->artisan('generate:token vinekaster@gmail.co password')->expectsOutput('Invalid credentials');
        $response->assertExitCode(0);
    }

    public function test_generate_token()
    {
        $user = User::factory()->create([
            'name' => 'Dmytro',
            'email' => 'qwerty123@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $response = $this->artisan('generate:token '.$user->email.' password');
        $response->assertSuccessful();
    }
}
