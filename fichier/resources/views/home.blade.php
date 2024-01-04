@extends('layouts.master')

@section('content')
    <h1 class="mb-4">Tous les Fichiers</h1>

    <div class="row">
        @forelse($documents as $document)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold lh-lg">{{$document->titre}}</h5>
                        <hr>
                        <p class="card-text">{{$document->description}}</p>
                        <p class="card-text">Downloads: {{$document->downloads}}</p>
                        <a href="{{route('details',['id' => $document->id])}}" class="btn btn-primary">Download</a>
                        @auth
                        @if ($document->user_id === Auth::user()->id || Auth::user()->role_id === 1)
                        <a href="{{route('delete',['id' => $document->id])}}" class="btn btn-danger">Delete</a>
                        @endif
                        @endauth
                        
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="alert alert-info">No documents found.</p>
            </div>
        @endforelse
    </div>
@endsection
