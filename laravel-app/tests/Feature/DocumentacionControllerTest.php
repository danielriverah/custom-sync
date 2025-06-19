<?php

namespace Tests\Feature;

use App\Models\Proyecto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentacionControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function documentacion_show_is_accessible(): void
    {
        $proyecto = Proyecto::factory()->create(['slug' => 'demo']);

        $response = $this->get("/proyecto/{$proyecto->slug}");

        $response->assertStatus(200);
    }
}
