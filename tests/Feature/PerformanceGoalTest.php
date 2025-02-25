<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerformanceGoalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_performance_goal(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'web')->get('/api/performanceGoals');
        
        $response->assertStatus(200);
    }
}