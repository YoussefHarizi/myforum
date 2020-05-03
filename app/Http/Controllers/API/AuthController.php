<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use App\User;

class AuthController extends Controller
{
    //register
    public function register(Request $request)
    {

        $valide = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        if ($valide->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $valide->errors()
            ], 422);
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'successfully created user'
        ], 201);
    }
}
