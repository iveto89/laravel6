<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_default_user_cannot_access_the_admin_section()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertRedirect('home');
    }

    /** @test */
    public function an_admin_can_access_the_admin_section()
    {
        $admin = factory('App\User')
            ->states('admin')
            ->create();

        $this->actingAs($admin)
            ->get('/admin')
            ->assertStatus(200);
    }
}
