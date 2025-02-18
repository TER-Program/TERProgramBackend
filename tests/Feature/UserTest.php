<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function it_can_create_a_user()
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

}
