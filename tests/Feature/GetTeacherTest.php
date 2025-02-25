<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTeacherTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_teachers_index()
{
    $response = $this->get('/api/teachers');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*' => [
            'id', 'name', 'email', 'role' 
        ]
    ]);
}
}
