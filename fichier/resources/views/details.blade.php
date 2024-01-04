@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-center">
@if(isset($document))
<div class="card w-75 d-flex justify-content-center">
    <div class="card-body w-100">
    <h5 class="card-title fw-bold lh-lg" style="color: green">Titre: {{$document->titre}}</h5>
    <hr>
    <p class="card-text">Description: {{$document->description}}</p>
    <p class="card-text">Downloads: {{$document->downloads}}</p>
    <a href="{{ route('document.download', ['id' => $document->id]) }}" class="btn btn-success w-100">Download</a>
</div> 
</div>
@else
<p>No document found.</p>
@endif
</div>
@endsection