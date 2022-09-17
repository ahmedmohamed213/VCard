<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('Auth.register');
    }
    public function registerRequest(RegisterRequest $request)
    {
        $user =  User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]
        );

        Session()->flash('done', 'user Was Created');

        // return redirect()->back();

        return view('Auth.login');
    }



    public function login()
    {
        return view('Auth.login');
    }
    public function loginRequest(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role == 0) {
                return redirect()->route('profile.create');
            } elseif ($user->role == 1) {
                return redirect()->route('admin.show_all_users');
            }
        }
        return back()->withErrors(['user or password incorrect']);
        // return redirect()->route("auth.register")->with('success', 'email or passowrd not valid');
    }

    public function destroy()
    {

        auth()->logout();
        return redirect()->route('login')->with('Good Bay!');
    }
}