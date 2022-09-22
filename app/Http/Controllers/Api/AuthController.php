<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends \App\Http\Controllers\Controller
{
    public function login(Request $request)
    {
        if ($token  =  JWTAuth::attempt(['email'  =>  $request->email, 'password'  =>  $request->password])) {

            $user  =  Auth::user();
            $user['token']  =  $token;

            return response()->json($user, 200);
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
        // dd("adsds");
        return  response()->json(Auth::user());
    }
}
