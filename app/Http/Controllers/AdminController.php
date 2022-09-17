<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminHome');
    }


    public function show_all_users()
    {
        $users = User::with("profile")->where("role", 0)->get();
        return view('admin.show_all_users', compact('users'));
    }

    public function show_user_profile($id)
    {
        $users = User::with("profile")->where("id", $id)->first();
        return view("Admin\show_user_peofile", ["profile" => $users->profile,]);
    }
}
