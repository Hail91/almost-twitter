<!-- container to hold posts -->
<div class="flex p-4 border-b border-b-gray-300">
     <!-- Avatar in this column -->
    <div class="mr-2 flex-shrink-0">
        <a href={{ route('show', $post->user) }}>
            <img
                src="{{ $post->user->avatar }}"
                alt="avatar-of-friend-in-list"
                class="rounded-full mr-2"
                width="50"
                style="height: 3.3rem"
                height="50"
            >
        </a>
    </div>
    <!-- Post itself in this column -->
    <div>
        <h5 class="font-bold mb-4">
            <div>
                <a href={{ route('show', $post->user) }}>
                    {{ $post->user->name }}
                </a>
                @if(strpos($post->created_at->diffForHumans(), 'day') !== false)
                <span class="ml-1 text-sm font-thin text-gray-600">{{\Carbon\Carbon::parse($post->created_at)->format('M d')}}</span>
                @else
                <span class="ml-1 text-sm font-thin text-gray-600">{{$post->created_at->diffForHumans()}}</span>
                @endif
            </div>
        </h5>
        <p class="text-sm">{{ $post->body }}</p>
    </div>
</div>
