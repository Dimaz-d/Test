<?php

namespace Tests\Feature;

use App\Models\TestObject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_forms_page()
    {
        $response = $this->get('/');

        $response->assertOk();
    }
    public function test_catalog_page()
    {
        $response = $this->get('/catalog');

        $response->assertOk();
    }
    public function test_create_object()
    {
        $user = User::factory()->create([
            'name' => 'Dmytro',
            'email' => 'qwerty12123@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $response = TestObject::factory()->create([
            'title' => 'test title',
            'price' => 1500,
            'count' => 2345,
            'description' => 'Lorem qwerty',
            'user_id'=> $user->id
        ]);
        $response = $this->assertDatabaseHas('test_objects', [
            'id' => $response->id
        ]);
    }
    public function test_delete_object()
    {
        $user = User::query()->where('email', 'qwerty12123@gmail.com')->first();
        $response = TestObject::factory()->create([
            'title' => 'test title',
            'price' => 1500,
            'count' => 2345,
            'description' => 'Lorem qwerty',
            'user_id'=> $user->id
        ]);
        $response = $this->assertDatabaseHas('test_objects', [
            'id' => $response->id
        ]);
    }
}
