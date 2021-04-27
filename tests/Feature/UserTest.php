<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name' => 'test',
            'email' => 'test@test.local',
            'password' => bcrypt('testtest.local'),
        ]);

        $response->assertOk();
//        $this->assertCount(1, User::all());
    }
}
