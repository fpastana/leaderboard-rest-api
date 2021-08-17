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
        $new_user = Str::random(10);
        $response = $this->post('/api/users', [
            'name' => $new_user,
            'email' => $new_user.'@gmail.com',
            'age' => 33,
            'points' => 0,
            'password' => Hash::make('password')
        ]);

        $new_user2 = Str::random(10);
        $response = $this->post('/api/users', [
            'name' => $new_user2,
            'email' => $new_user2.'@gmail.com',
            'age' => 33,
            'points' => 0,
            'password' => Hash::make('password')
        ]);
        $response->assertStatus(200);

        $user = User::orderBy('id', 'desc')->first();

        $this->assertEquals($new_user2, $user->name);
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
        $user_id = User::orderBy('id', 'desc')->first()->id;
        $user = User::where('id', $user_id)->first();

        $response = $this->patch('/api/users/addPoint/'.$user->id);
        $response->assertStatus(200);

        $updated_user = User::where('id', $user_id)->first();

        $this->assertGreaterThan($user->points, $updated_user->points);
    }

    /** @test */
    public function a_user_can_take_away_a_point()
    {
        $user_id = User::orderBy('id', 'desc')->first()->id;
        $user = User::where('id', $user_id)->first();

        $response = $this->patch('/api/users/subPoint/'.$user->id);
        $response->assertStatus(200);

        $updated_user = User::where('id', $user_id)->first();

        $this->assertLessThan($user->points, $updated_user->points);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $user_id = User::orderBy('id', 'desc')->first()->id;

        $response = $this->delete('/api/users/'.$user_id);
        $response->assertStatus(200);

        $this->assertCount(0, User::where('id', $user_id)->get());

    }
}
