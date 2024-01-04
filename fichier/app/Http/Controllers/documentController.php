<?php

namespace App\Http\Controllers;

use App\Models\documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class documentController extends Controller
{
    public function show()
    {
        return view('addFichier');
    }




    public function store(Request $req)
    {
        $req->validate([
            'titre' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);

        try {
            $uploadedFile = $req->file;
            $filePath = $uploadedFile->store('uploads', 'public');

            documents::create([
                'titre' => $req->titre,
                'description' => $req->description,
                'file_path' => $filePath,
                'user_id' => Auth::user()->id,
                'categorie_id' => 1,

            ]);

            return redirect()->route('home')->with('success', 'Document ajouter');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error uploading document: ' . $e->getMessage());
        }
    }



    public function download($id)
    {

        $document = documents::find($id);
        if (!$document) return redirect()->route('home')->with('error', 'Document not found');

        $filePath = $document->file_path;

        if (Storage::exists('public/' . $filePath)) {
            $document->increment('downloads');
            return response()->download(storage_path('app/public/' . $filePath));
        } else {

            return redirect()->route('home')->with('error', 'File not found');
        }
    }


    public function delete($id)
    {
        $document = documents::find($id);

        if (!$document) {
            return redirect()->route('home')->with('error', 'Document not found');
        }

        $document->delete();

        return redirect()->route('home')->with('success', 'Document deleted successfully');
    }
}
