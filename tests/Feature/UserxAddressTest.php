<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Address;

class UserxAddressTest extends TestCase
{
    /** @test */
    public function an_address_can_be_added_to_the_user()
    {
        $this->withoutExceptionHandling();

        $new_address = Str::random(20);
        $complement = Str::random(20);

        $user = User::orderBy('id', 'desc')->first();

        $response = $this->post('/api/users/' . $user->id . '/addresses', [
            'user_id' => $new_address,
            'streetname' => $new_address,
            'number' => 10,
            'complement' => $complement,
            'postal_code' => 'L5B0K9',
            'province' => 'BC',
            'country' => 'ca'
        ]);

        $address = Address::orderBy('id', 'desc')->first();

        $this->assertEquals($new_address, $address->streetname);
    }
}
