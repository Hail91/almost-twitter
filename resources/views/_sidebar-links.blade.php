<ul>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="{{ route('home') }}">
            <i class="fas fa-home mr-2"></i>
            Home
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="/explore">
            <i class="fas fa-search mr-2"></i>
            Explore
        </a>
    </li>
    <li style="width: 139px">
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="#">
            <i class="far fa-bell mr-2"></i>
            Notifications
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="#">
            <i class="far fa-envelope mr-1"></i>
            Messages
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="#">
            <i class="far fa-bookmark mr-2"></i>
            Bookmarks
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="#">
            <i class="far fa-list-alt mr-1"></i>
            Lists
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="{{ route('show', auth()->user()) }}">
            <i style="margin-right: 0.35rem" class="far fa-user"></i>
            Profile
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="{{ route('logout') }}">
            <i style="margin-right: 0.35rem" class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </li>
    <li>
        <a class="transition duration-200 ease-in-out hover:text-blue-500 font-bold text-lg mb-4 block" href="#">
            <i class="fas fa-arrow-right mr-1"></i>
            More
        </a>
    </li>
</ul>
