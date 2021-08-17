<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Address;

class UserTest extends TestCase
{
    /** @test */
    public function a_user_can_be_added_to_the_app()
    {
        $this->withoutExceptionHandling();

        $new_user = Str::random(10);

        $newUser = [
            'name' => $new_user,
            'email' => $new_user.'@gmail.com',
            'age' => 33,
            'points' => 0,
            'password' => Hash::make('password')
        ];

        $response = $this->post('/api/users', $newUser);

        $user = User::orderBy('id', 'desc')->first();

        $this->assertEquals($new_user, $user->name);
    }

    /** @test */
    public function get_all_users_from_the_the_app()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_receive_a_point()
    {
        $this->withoutExceptionHandling();

        $user_id = 1;
        $user = User::where('id', $user_id)->first();

        $response = $this->patch('/api/users/addPoint/'.$user->id);

        $updated_user = User::where('id', $user_id)->first();

        $this->assertGreaterThan($user->points, $updated_user->points);
    }

    /** @test */
    public function a_user_can_take_away_a_point()
    {
        $this->withoutExceptionHandling();

        $user_id = 1;
        $user = User::where('id', $user_id)->first();

        $response = $this->patch('/api/users/subPoint/'.$user->id);

        $updated_user = User::where('id', $user_id)->first();

        $this->assertLessThan($user->points, $updated_user->points);
    }
}
