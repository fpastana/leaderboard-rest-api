<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $new_address = [
            'user_id' => $user_id,
            'streetname' => $request->streetname,
            'number' => $request->number,
            'complement' => $request->complement,
            'postal_code' => $request->postal_code,
            'province' => $request->province,
            'country' => $request->country
        ];
        // $new_adress = Address::create();

        $request->request->add(['user_id' => $user_id]);

        $new_adress = Address::create($request->all());

        return response()->json($new_address, 200);
    }
}
