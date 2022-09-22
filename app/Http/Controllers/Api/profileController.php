<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function index()
    {
        $profiles = Profile::get();
        return response()->json($profiles);
    }

    public function store(Request $request)
    {
        dd(Auth::user());
        $profile  =  Profile::create(
            [
                'profile_name'  =>  $request->profile_name,
                'profile_title'  =>  $request->profile_title,
                'phone'  =>  $request->phone,
                'email'  =>  $request->email,
                'facebook'  =>  $request->facebook,
                'linkedin'  =>  $request->linkedin,
                'github'  =>  $request->github,
                'profile_pic'  =>  $request->profile_pic,
                'user_id' =>  Auth::user()->id,

            ]
        );
        return response()->json($profile);
    }
}