<?php

namespace App\Http\Controllers;


use App\Models\documents;
use Illuminate\Http\Request;

class detailsController extends Controller
{
    public function show($id)
{
    $document = documents::find($id);

    if (!$document) {
        return redirect()->route('home')->with('error', 'Document not found');
    }

    return view('details', ['document' => $document]);
}
}
