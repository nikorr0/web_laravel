<x-app-layout>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Users</h1>
            <div class="container row row-cols-3 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                @foreach ($users as $user)
                    <div class="card text-bg-primary mb-3 p-2 col">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                        </div>
                        <a class="btn btn-secondary mb-1" href="{{route('user.cards', ['user' => $user->name])}}">User's cards</a>
                        @if(auth()->user()->friends->contains($user))
                            <form action="{{ route('friends.remove', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Unfriend</button>
                            </form>
                        @else
                            <form action="{{ route('friends.add', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Add as a friend</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>