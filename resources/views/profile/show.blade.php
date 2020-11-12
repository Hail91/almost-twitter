@extends('layouts.app')

@section('content')
    <header class="mb-b">
        <img
            src="https://source.unsplash.com/random"
            alt="profile-img" 
        /> 
        <div class="flex justify-between">
            <h2>{{ $user->name }}</h2>
            <p>Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>
        <div>
            <a href="" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Edit Profile</a>
        </div>
    </header>
    @include('_timeline', [
        'posts' => $user->posts
    ])
@endsection