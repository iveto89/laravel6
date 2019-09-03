<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function guests_may_not_create_teams()
    {
        $this->post('/teams')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_a_team()
    {
        //$this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $this->post('/teams', [
            'name' => 'Jane',
        ]);

        $this->assertDatabaseHas('teams', ['name' => 'Jane']);
    }
}
