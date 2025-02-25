<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScoreByTeacher extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_score_by_teacher(): void
    {
        $response = $this->get('/api/scorebyteacher');

        $response->assertStatus(200);
    }
}
