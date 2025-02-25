<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScoreByTeacherTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_scoreByTeacher_index()
    {
        $response = $this->get('/api/scorebyteacher');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'teacher_id', 'score' 
            ]
        ]);
    }
}