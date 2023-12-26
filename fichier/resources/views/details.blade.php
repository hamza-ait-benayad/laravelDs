@extends('layouts.master')

@section('content')
@if(isset($document))
<div class="card w-100" >
    <div class="card-body">
    <h5 class="card-title">Title:{{$document->titre}}</h5>
    <p class="card-text">Description:{{$document->description}}</p>
    <a href="{{ route('document.download', ['id' => $document->id]) }}" class="btn btn-primary">Download</a>
</div> 
</div>
@else
<p>No document found.</p>
@endif
@endsection