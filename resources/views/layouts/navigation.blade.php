<nav class="border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Header -->
            <div class="header-container">
                <nav class="navbar navbar-expand-xl">
                    <div class="container-fluid" style="justify-content: flex-start;">
                        <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Europe_and_the_European_Union.svg/800px-Europe_and_the_European_Union.svg.png" />
                        <!-- <a class="navbar-brand" href="/">Countries</a> -->

                        <x-nav-item :href="route('cards.index')" :active="request()->routeIs('dashboard')">
                            Main page
                        </x-nav-item>

                        <x-nav-item :href="route('user.feed')" :active="request()->routeIs('user.feed')">
                            Feed
                        </x-nav-item>

                        @if(auth()->user() && auth()->user()->is_admin)
                            <x-nav-item :href="route('cards.indexTrash')" :active="request()->routeIs('cards.indexTrash')">
                                Trash bin
                            </x-nav-item>
                        @endif
                        
                        @if(auth()->user())
                            <x-nav-item :href="route('users.index')" :active="request()->routeIs('users.index')">
                                Users
                            </x-nav-item>
                            <a style="margin-left: auto;">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('cards.create') }}">Create</a>
                                </div>
                            </a>
                        @endif

                        <!-- Settings Dropdown -->
                        @if(auth()->user())
                            <div class="relative sm:flex sm:items-center sm:ms-6" style="margin-left: 2em;">
                                <button id="user-menu-toggle" class="btn btn-primary">
                                    <div>{{ Auth::user()->name }}</div>
                                    <!-- <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div> -->
                                </button>

                                <!-- Dropdown Menu -->
                                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-md">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ __('Profile') }}
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="hidden sm:flex sm:items-center sm:ms-6" style="margin-left: auto;">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        @endif

                    </div>
                </nav>
            </div>
        </div>
    </div>
</nav>
<script src="./main.js"></script>