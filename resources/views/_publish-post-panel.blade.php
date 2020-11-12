<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/posts" method="POST">
        @csrf
        <textarea 
            name="body" 
            class="w-full outline-none"
            placeholder="What's going on today?"
        >
        </textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="avatar-of-friend-in-list"
                class="rounded-full mr-2" 
                width="50"
                height="50"
            >
            <button class="transition duration-300 ease-in-out bg-blue-400 hover:bg-blue-500 rounded-full shadow h-10 py-2 px-2 text-white" type="submit">Create a Post</button>
        </footer>
    </form>
    @error('body')
        <p class="text-red-500 text-sm pt-3">{{ $message }}</p>
    @enderror
</div>