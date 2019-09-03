<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_have_a_team()
    {
        $user = factory('App\User')->create();

        $user->team()->create(['name' => 'Jane']);

        $this->assertEquals('Jane', $user->team->name);
    }
}
