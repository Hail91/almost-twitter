<div class="border border-gray-100 rounded-lg">
    @forelse($posts as $post)
        @include('_single-post')
        @empty
            <p class="p-4">No posts yet!</p>
    @endforelse
</div>
