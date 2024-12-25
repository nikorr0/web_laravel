<div class="header-container">
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid">
        <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Europe_and_the_European_Union.svg/800px-Europe_and_the_European_Union.svg.png"/>
        <a class="navbar-brand" href="/">Countries</a>
            <li class="nav-item">
                <x-nav-link :href="route('cards.index')" :active="request()->routeIs('dashboard')">
                    Main page
                </x-nav-link>
            </li>
            
            @if(auth()->user() && auth()->user()->is_admin)
                <li class="nav-item">
                    <x-nav-link :href="route('cards.indexTrash')" :active="request()->routeIs('cards.indexTrash')">
                        Trash bin
                    </x-nav-link>
                </li>
            @endif
            
            @if(auth()->user())
                <li class="nav-item">
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        Users
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link :href="route('cards.create')" :active="request()->routeIs('cards.create')">
                        Create
                    </x-nav-link>
                </li>
            @endif
        </div>
        <div class="navbar" id="navbarTogglerDemo02">
            <a href="/cards/create" class="btn btn-primary">Create</a>
            <div class="toast-container position-fixed bottom-0 end-0 p-3"></div>
        </div>
    </nav>
</div>