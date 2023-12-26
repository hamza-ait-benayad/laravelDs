@extends('layouts.master')

@section('content')
<div class="container w-75 border p-4 border rounded">
    <form method="POST" action="{{ route('document.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">titre</label>
            <input type="text" class="form-control" name="titre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description</label>
            <input type="text" class="form-control"  name="description">
        </div>
        <div class="mb-3">
        <label for="file">File:</label>
        <input type="file" name="file" >
        <br>
        </div>
        <button type="submit" class="btn btn-primary w-100">AddFichier</button>
    </form>
    </div>
@endsection
