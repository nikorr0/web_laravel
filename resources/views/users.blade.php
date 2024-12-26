<x-app-layout>
    <div class="card-list-name">
          <h1>List of registered users</h1>
    </div>
    <div class="cards-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 g-4">
            @foreach ($users as $user)
                <div class="col">
                    <div class="card h-100 card-color">
                        <div class="card-body">
                            <h5 class="card-title">Username: <strong>{{ $user->name }}</strong></h5>
                            <p class="card-text">Email: <strong>{{ $user->email }}</strong></p>
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
                    </div>
                </div>  
            @endforeach
        </div>
    </div>
</x-app-layout>