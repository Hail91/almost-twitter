@component('components.app')
    <header class="mb-6 relative">
        <div class="relative">
            <img
                class="mb-2 h-40 w-full object-cover rounded-lg"
                src="https://source.unsplash.com/random"
                alt="profile-img" 
            > 
            <img 
                src="{{ $user->avatar }}"
                alt="Hello"
                class="rounded-full mr-2 absolute bottom-0 transform translate-x-1/2 translate-y-1/2"
                style="left: 30%"
                width="150"
            >   
        </div>
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="font-thin text-gray-600">Joined {{\Carbon\Carbon::parse($user->created_at)->format('F Y')}}</p>
            </div>
            <div class="flex">
                <a href="" class="mr-4 transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">Edit Profile</a>
                @if(auth()->user()->isFollowing($user))
                <form method="POST" action="/profile/{{ $user->name }}/unfollow">
                @csrf
                @method('DELETE')
                    <button 
                        type="submit"
                        class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">
                        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
                @else 
                <form method="POST" action="/profile/{{ $user->name }}/follow">
                @csrf
                    <button 
                        type="submit"
                        class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">
                        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
                @endif
             </div>
        </div>
    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna aliqua. Ac tortor dignissim 
    convallis aenean et tortor.</p>
</header>
@include('_timeline', [
    'posts' => $user->posts
])
@endcomponent