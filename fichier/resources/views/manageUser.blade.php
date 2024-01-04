@extends('layouts.master')

@section('content')
<h1 class="mb-4">Tous les Users</h1>

<div class="row">
    @forelse($users as $user)
    @if ($user->role_id !== 1)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold lh-lg">{{$user->name}}</h5>
                    <hr>
                    <p class="card-text">{{$user->email}}</p>
                    @auth
                    @if (Auth::user()->role_id === 1)
                    <a href="{{route('deleteUser',['id' => $user->id])}}" class="btn btn-danger">Delete</a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        @endif
    @empty
        <div class="col-12">
            <p class="alert alert-info">No users found.</p>
        </div>
    @endforelse
</div>
@endsection