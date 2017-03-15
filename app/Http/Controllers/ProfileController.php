<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('first.login', ['except'=>['password','updatePassword']]);
    }

    public function index()
    {
    	return view('profile.index', ['user'=>auth()->user()]);
    }

    public function update(Request $request)
    {
        $rules = array_except(User::$rules,['email']);
        $this->validate($request, $rules);

        $user = auth()->user();
        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'district' => $request->input('district'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'object_type' => $request->input('object_type'),
        ]);

        return redirect()->route('profile.index')
            ->with(['status'=>'success'])
            ->with(['message'=>'Profile successfully updated']);
    }

    public function password()
    {
    	return view('profile.password');
    }

    public function updatePassword(Request $request)
    {
    	$rules = [];
    	$messages = [];
    	$rules = array_add($rules, 'current_password', 'required');
    	$rules = array_add($rules, 'new_password', 'required|confirmed');
        if(!auth()->user()->first_login){
            $rules = array_add($rules, 'agree', 'accepted');
            $messages = ['agree.accepted'=>'Please agree to the terms of services and privacy policy'];
        }
    	$this->validate($request,$rules,$messages);

    	$user = auth()->user();
        if(Hash::check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->first_login = true;
            $user->save();

            return redirect()->route('home');
        }
    	$rules = ['password_match'=>'accepted'];
    	$messages = ['password_match.accepted'=>'current password does not match'];
    	$this->validate($request,$rules,$messages);
    }
}
