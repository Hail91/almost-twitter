@extends('layouts.app')

@section('content')
    <header class="mb-6">
        <img
            class="mb-2 h-40 w-full object-cover rounded-lg"
            src="https://source.unsplash.com/random"
            alt="profile-img" 
        > 
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p>Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
        <div>
            <a href="" class="bg-blue-400 rounded-full shadow py-2 px-2 text-white text-s">Edit Profile</a>
            <a href="" class="bg-blue-400 rounded-full shadow py-2 px-2 text-white text-s">Follow Me</a>
        </div>
    </div>
</header>
@include('_timeline', [
    'posts' => $user->posts
])
@endsection