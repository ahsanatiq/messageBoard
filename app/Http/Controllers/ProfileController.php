<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('profile.index', ['user'=>auth()->user()]);
    }

    public function update(Request $request)
    {
    	$user = auth()->user();
        $rules = array_only(User::$rules,['firstName','lastName']);

        if($request->avatar)
            $rules = array_add($rules, 'avatar', 'file|image');

        $this->validate($request,$rules);

        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->timezone = $request->timezone;

        if($request->avatar)
        {
            $oldAvatar = $user->avatar;
            $avatarFilename = time().'_'.$user->id.'.'.$request->avatar->extension();
            $newAvatar = Image::make($request->avatar)->fit(150);
            \Storage::disk('public')->put('avatars/'.$avatarFilename, $newAvatar->encode());
            if($oldAvatar) {
                \Storage::disk('public')->delete('avatars/'.$oldAvatar);
            }
            $user->avatar = $avatarFilename;
        }
        $user->save();

        return redirect()->back()
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
    	$rules = array_add($rules, 'current_password', 'required');
    	$rules = array_add($rules, 'new_password', User::$rules['password'].'|confirmed');
    	$this->validate($request,$rules);

    	$user = auth()->user();
    	if($user->password==bcrypt($request->password_current))
    		$request->password_match = true;
    	$rules = ['password_match'=>'accepted'];
    	$messages = ['password_match.accepted'=>'current password does not match'];
    	$this->validate($request,$rules,$messages);
    	// dd($rules);
    }
}
