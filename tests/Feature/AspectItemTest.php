<?php

namespace Tests\Feature;

use App\Models\AspectItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AspectItemTest extends TestCase
{
     /** @test */
     public function test_it_returns_a_successful_response()
     {
         // Létrehozunk néhány tesztadatot
        //  AspectItem::factory(3)->create();

         // API hívás a teszt során
         $response = $this->get('/api/aspectItem');

         // Ellenőrzések
         $response->assertStatus(200);
     }
}
