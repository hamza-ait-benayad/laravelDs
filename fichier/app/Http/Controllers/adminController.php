<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('manageUser',compact('users'));
    }

    public function delete($id){
        $user = User::find($id);
        if(!$user) return to_route('manageUser')->with('error' , 'user not fond');
        $user->delete();
        return to_route('manageUser')->with('success' , 'user has deleted');
    }


}
