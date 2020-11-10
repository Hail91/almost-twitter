<!-- container to hold posts -->
<div class="flex p-4 border-b border-b-gray-400">
     <!-- Avatar in this column -->
    <div class="mr-2 flex-shrink-0">
        <img
            src="{{ $post->user->avatar }}"
            alt="avatar-of-friend-in-list"
            class="rounded-full mr-2" 
        />
    </div>
    <!-- Post itself in this column -->
    <div>
        <h5 class="font-bold mb-4">{{ $post->user->name }}</h5>
        <p class="text-sm">{{ $post->body }}</p>
    </div>
</div>