@extends('layouts.app')

@section('content')
    <header class="mb-6 relative">
        <img
            class="mb-2 h-40 w-full object-cover rounded-lg"
            src="https://source.unsplash.com/random"
            alt="profile-img" 
        > 
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p>Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
        <div>
            <a href="" class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">Edit Profile</a>
            <a href="" class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">Follow Me</a>
        </div>
    </div>
    <img 
        src="{{ $user->avatar }}"
        alt=""
        class="rounded-full mr-2 absolute"
        style="width: 150px; left: calc(50% - 75px); top: 30%;"
    />
    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna aliqua. Ac tortor dignissim 
    convallis aenean et tortor.</p>
</header>
@include('_timeline', [
    'posts' => $user->posts
])
@endsection