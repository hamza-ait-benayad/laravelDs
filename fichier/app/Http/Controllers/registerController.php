<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;


class registerController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'role_id' => 2
        ]);

        $role = role::find($user->role_id);
        $user->roles()->attach($role);


        return redirect()->route('login')->with('success', 'Your registration has been completed successfully');
    }
}
