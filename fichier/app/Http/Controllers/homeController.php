<?php

namespace App\Http\Controllers;


use App\Models\documents;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function show(){
        $documents = documents::all();
        return view('home', compact('documents'));
    }


}
