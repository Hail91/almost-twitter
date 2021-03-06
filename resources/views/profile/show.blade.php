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
                style="left: 30%; height: 9rem"
                width="150"
            >
        </div>
        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 400px">
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <h3 class="font-thin text-gray-600 -mt-1">{{ '@' . $user->username }}</h3>
                <div class="flex">
                    <!-- Location will need to be made dynamic after schema is updated -->
                    <p class="font-thin text-gray-600"><i class="fas fa-map-marker-alt mr-2"></i>Syracuse, NY</p>
                    <p class="font-thin text-gray-600 ml-4"><i class="far fa-calendar-alt mr-2"></i>Joined {{\Carbon\Carbon::parse($user->created_at)->format('F Y')}}</p>
                </div>
            </div>
            @if(auth()->user()->name !== $user->name)
            <div class="flex">
                @if(auth()->user()->isFollowing($user))
                <form method="POST" action="/profile/{{ $user->username }}/unfollow">
                @csrf
                @method('DELETE')
                    <button
                        type="submit"
                        class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">
                        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
                @else
                <form method="POST" action="/profile/{{ $user->username }}/follow">
                @csrf
                    <button
                        type="submit"
                        class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow py-2 px-2 text-white text-s">
                        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
                @endif
             </div>
            @else
            <a href="{{ $user->path('edit') }}" class="mr-4 rounded-full shadow py-2 px-2 text-blue-500 text-s border border-blue-500">Edit Profile</a>
            @endif
        </div>
    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ac tortor dignissim
    convallis aenean et tortor.</p>
</header>
@include('_timeline', [
    'posts' => $posts
])
@endcomponent
