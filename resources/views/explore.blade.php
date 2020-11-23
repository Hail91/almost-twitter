<x-app>
    <div class="flex-wrap">
        @foreach ($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center mb-5">
            <img
                src="{{ $user->avatar }}"
                alt="{{ $user->username }}'s avatar'"
                width="60"
                class="mr-4 rounded-full"
            />
            <h4 class="font-bold">{{ '@' . $user->username }}</h4>
        </a>
        @endforeach
    </div>
</x-app>
