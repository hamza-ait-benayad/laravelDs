<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }
    
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = ['email' => $req->email, 'password' => $req->password];

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('home')->with('success', 'Your login has been completed successfully');
        } else {
            return back()->withErrors([
                'login' => 'Email or password not valide'
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request){
   
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
         
            return redirect()->route('login');
        
    }
}
