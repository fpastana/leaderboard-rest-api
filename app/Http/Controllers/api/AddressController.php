<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $request->request->add(['user_id' => $user_id]);

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                'exists:App\Models\User,id'
            ],
            'streetname' => "required|max:255",
            'number' => "required|integer",
            'complement' => "max:255",
            'postal_code' => "required|min:6|max:6",
            'province' => "required|min:2|max:2",
            'country' => "required|min:2|max:2"
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 412);
        }

        $new_address = [
            'user_id' => $user_id,
            'streetname' => $request->streetname,
            'number' => $request->number,
            'complement' => $request->complement,
            'postal_code' => $request->postal_code,
            'province' => $request->province,
            'country' => $request->country
        ];

        $new_adress = Address::create($request->all());

        return response()->json($new_address, 200);
    }
}
