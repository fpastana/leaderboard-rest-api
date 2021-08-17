<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('points', 'desc')->get();

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'points' => 0,
            'password' => Hash::make('password'),
        ]);

        return response()->json($user, 200);
    }

    public function addPoint($id)
    {

        $user = User::where('id', $id)->first();

        $points = $user->points + 1;

        $updatedUser = User::where('id', $id)
        ->update([
            'points' => $points
        ]);

        return response()->json($updatedUser, 200);
    }

    public function subPoint($id)
    {

        $user = User::where('id', $id)->first();

        $points = $user->points - 1;

        $updatedUser = User::where('id', $id)
        ->update([
            'points' => $points
        ]);

        return response()->json($updatedUser, 200);
    }
}
