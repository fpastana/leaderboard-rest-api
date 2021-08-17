<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'user_id' => 1,
            'streetname' => 'Parkside Village Dr',
            'number' => '4085',
            'complement' => 'apt 707',
            'postal_code' => 'L5B0K9',
            'province' => 'ON',
            'country' => 'ca'
        ]);

        Address::create([
            'user_id' => 2,
            'streetname' => 'Summerhill Loan',
            'number' => '107',
            'complement' => null,
            'postal_code' => 'V3H01K9',
            'province' => 'BC',
            'country' => 'ca'
        ]);

        Address::create([
            'user_id' => 2,
            'streetname' => 'Imperial Wynd',
            'number' => '207',
            'complement' => null,
            'postal_code' => 'V3H01K7',
            'province' => 'BC',
            'country' => 'ca'
        ]);

        Address::create([
            'user_id' => 3,
            'streetname' => 'Hertford Gardens',
            'number' => '987',
            'complement' => null,
            'postal_code' => 'V3Y0K9',
            'province' => 'BC',
            'country' => 'ca'
        ]);

        Address::create([
            'user_id' => 4,
            'streetname' => 'Cross Point',
            'number' => '452',
            'complement' => null,
            'postal_code' => 'L5B0K2',
            'province' => 'ON',
            'country' => 'ca'
        ]);

        Address::create([
            'user_id' => 5,
            'streetname' => 'Lamb Point',
            'number' => '872',
            'complement' => null,
            'postal_code' => 'T7S0L3',
            'province' => 'AL',
            'country' => 'ca'
        ]);

        Address::create([
            'user_id' => 5,
            'streetname' => 'Hatton Acre',
            'number' => '444',
            'complement' => null,
            'postal_code' => 'T7S0L5',
            'province' => 'AL',
            'country' => 'ca'
        ]);
    }
}
