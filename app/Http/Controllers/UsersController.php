<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','auth.role']);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function add() {
        return view('users.add');
    }

    public function create(Request $request) {
        $rules = User::$rules;
        $this->validate($request, $rules);

        $password = str_random('8');
        $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'district' => $request->input('district'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'object_type' => $request->input('object_type'),
            'role_id' => $request->input('role_id'),
            'password' => bcrypt($password),
        ]);

        return redirect()->route('users.index')
            ->with(['status'=>'success'])
            ->with(['message'=>'User successfully created']);
    }

    public function edit($id) {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request) {
        $rules = array_except(User::$rules,['email']);
        $this->validate($request, $rules);

        $user = User::find($id);
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
            'role_id' => $request->input('role_id')
        ]);

        return redirect()->route('users.index')
            ->with(['status'=>'success'])
            ->with(['message'=>'User successfully updated']);
    }

    public function delete(Request $request) {
        User::destroy($request->input('id'));
        return redirect()->route('users.index');
    }
}
