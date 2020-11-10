<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/posts" method="POST">
        @csrf
        <textarea 
            name="body" 
            class="w-full"
            placeholder="What's going on today?"
        >
        </textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="avatar-of-friend-in-list"
                class="rounded-full mr-2" 
            />
            <button class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white" type="submit">Create a Post</button>
        </footer>
    </form>
    @error('body')
        <p class="text-red-500 text-sm pt-3">{{ $message }}</p>
    @enderror
</div>