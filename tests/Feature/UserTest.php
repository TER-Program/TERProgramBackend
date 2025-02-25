<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Container\Attributes\Log as AttributesLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // Minden teszt után visszaállítja az adatbázist

    /** @test */
    public function test_user_create()
    {
        // Adat létrehozása
        $user = User::factory()->create([
            'name' => 'Teszt Felhasználó',
            'email' => 'test@example.com',
            'role' => 2,
            'started' => now()->subYears(1)->toDateString(),
            'ended' => null,
        ]);

        // Ellenőrzés
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Teszt Felhasználó',
            'role' => 2,
        ]);
    }



    public function test_Setrole()
    {
        $user = User::create([
            'name' => 'Johnny Johnny',
            'email' => 'johnny@johnny.com',
            'password' => Hash::make('Johnny123456'),
            'role' => 1,
            'started' => '2025-01-01'
        ]);

        // Naplózzuk a létrehozott felhasználót
        Log::info('Létrehozott felhasználó:', ['user' => $user]);

        // Frissítjük a felhasználó szerepét
        $newRole = 2;
        $controller = new \App\Http\Controllers\UserController();
        $controller->setRole($user->id, $newRole);

        // Lekérjük a frissített felhasználót
        $updateUser = User::find($user->id);

        // Naplózzuk a frissített felhasználót
        Log::info('Frissített felhasználó:', ['updateUser' => $updateUser]);

        // Ellenőrizzük, hogy a szerep frissült-e
        $this->assertEquals($newRole, $updateUser->role, 'A szerep frissítése nem sikerült.');
    }
}
