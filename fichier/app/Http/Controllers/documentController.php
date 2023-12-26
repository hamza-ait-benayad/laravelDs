<?php

namespace App\Http\Controllers;

use App\Models\documents;
use Illuminate\Http\Request;

class documentController extends Controller
{
    public function show(){
        return view('addFichier');
    }

    
    public function store(Request $req)
    {
        $req->validate([
            'titre' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);


        $uploadedFile = $req->file;
        $filePath = $uploadedFile->store('uploads', 'public');

       documents::create([
            'titre' => $req->titre,
            'description' => $req->description,
            'file_path' => $filePath,
            'user_id' => 1,
            'category_id' => 1,
            
        ]);

        return redirect()->route('home')->with('success', 'Document ajouter');
    }

    public function download($id)
{
    $document = documents::find($id);

    if (!$document) {
        return redirect()->route('home')->with('error', 'Document not found');
    }

    $document->increment('downloads');
    return response()->download(storage_path('app/public/' . $document->file_Path));
    
}
}
