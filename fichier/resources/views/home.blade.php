@extends('layouts.master')

@section('content')
@if($documents->count() > 0)
@foreach($documents as $document)
<div class="card w-100" >
    <div class="card-body">
      <h5 class="card-title">{{$document->titre}}</h5>
      <p class="card-text">{{$document->description}}</p>
      <a href="{{route('details',['id' => $document->id])}}" class="btn btn-primary">Download</a>
    </div>
  </div>
  @endforeach
  @else
  <p>No documents found.</p>
@endif
@endsection