<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
    <li class="mb-4">
        <div class="flex items-center text-sm">
            <a href={{ route('show', $user) }}>
                <img
                    src="{{ $user->avatar }}"
                    alt="avatar-of-friend-in-list"
                    class="rounded-full mr-2" 
                />
            </a>
            <a href={{ route('show', $user) }}>
                {{ $user->name }}  
            </a>
        </div>
    </li>
    @endforeach
</ul>