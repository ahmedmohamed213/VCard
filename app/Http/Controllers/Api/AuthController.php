<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends \App\Http\Controllers\Controller
{
    public function login(Request $request)
    {
        if ($token = JWTAuth::attempt(['email' => $request->email, 'password'   =>  $request->password])) {
            // dd(Auth::user());

            return response()->json(['token' => $token], 200);
        }


        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register(Request $request)
    {
        $user  =  User::create(
            [
                'name'  =>  $request->name,
                'email' =>  $request->email,
                'password'   =>  Hash::make($request->password)
            ]
        );

        // $user['token'] = JWTAuth::fromUser($user);
        return response()->json(['user' => $user], 200);
    }

    public function auth()
    {
        return  response()->json(Auth::user());
    }
}