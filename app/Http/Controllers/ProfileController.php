<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\FingersCrossedHandler;

class ProfileController extends Controller
{

    public function create()
    {
        return view('profile.create');
    }


    public function store(ProfileRequest $request)
    {
        $profileImgName = time() . $request->file('profile_pic')->getClientOriginalName();
        $profilePath = 'profileImges';
        $request->file('profile_pic')->move($profilePath, $profileImgName);

        $profile =  Profile::create(['user_id' => Auth::id(), "profile_pic" => $profileImgName] + $request->validated());

        Session()->flash('done', 'Profile Was Created');
        return redirect()->back();
    }


    public function index(Profile $profile)
    {

        return view('profile.index', compact('profile'));
    }



    public function indexView()
    {

        $profiles = Auth::user()->profile;
        if (empty($profiles)) {
            return view('profile.create');
        } else {

            return view('profile.indexView', compact('profiles'));
        }
    }


    public function delete(Request $request)
    {
        $profiles = Profile::find($request->id);
        if ($profiles) {
            $profiles->delete();
            Session()->flush('done', 'Profile Was Deleteed!');
            return view('profile.create');
        }
    }

    public function edit($id)
    {

        $profiles = Profile::find($id);

        return view('profile.edit', compact('profiles'));
    }


    public function update(UpdateProfileRequest $request)
    {
        $profile = Profile::find($request->id);

        $profileImgName = time() . $request->file('profile_pic')->getClientOriginalName();
        $profilePath = 'profileImges';
        $request->file('profile_pic')->move($profilePath, $profileImgName);

        $profile->update(['user_id' => Auth::id(), "profile_pic" => $profileImgName] + $request->validated());

        Session()->flash('done', 'Profile Updated !');

        return redirect(route('profile.indexView'));
    }
}