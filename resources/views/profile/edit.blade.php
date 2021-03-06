<x-app>
    <form action="{{ $user->path()}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="name"
            >
                Name
            </label>
            <input class="focus:outline-none focus:border-blue-500 border border-gray-400 p-2 w-full"
                type="text"
                value="{{ $user->name }}"
                name="name"
                id="name"
            >
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="username"
            >
                Username
            </label>
            <input class="focus:outline-none focus:border-blue-500 border border-gray-400 p-2 w-full"
                type="text"
                value="{{ $user->username }}"
                name="username"
                id="username"
            >
            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="avatar"
                >
                    Avatar
            </label>
            <div class="flex">
                <input class="focus:outline-none focus:border-blue-500 border border-gray-400 p-2 w-full"
                    type="file"
                    name="avatar"
                    id="avatar"
                >
                <img
                    src="{{ $user->avatar }}"
                    alt="Your avatar"
                    width="40"
                    class="rounded-full ml-4"
                />
            </div>
            @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="email"
            >
                Email
            </label>
            <input class="focus:outline-none border focus:border-blue-500 border-gray-400 p-2 w-full"
                type="email"
                value="{{ $user->email }}"
                name="email"
                id="email"
            >
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password"
            >
                Password
            </label>
            <input class="focus:outline-none focus:border-blue-500 border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password_confirmation"
            >
                Confirm Password
            </label>
            <input class="focus:outline-none focus:border-blue-500 border border-gray-400 p-2 w-full"
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required
            >
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                Submit
            </button>
            <a class="hover:underline" href="{{ $user->path() }}">Cancel</a>
        </div>
    </form>
</x-app>
