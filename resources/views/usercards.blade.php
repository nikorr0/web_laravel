<x-app-layout>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-list-name">
                <h1>User's cards</h1>
            </div>
            <div class="container row row-cols-3 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
                @foreach ($cards as $card)
                    <x-fullcard :card="$card"/>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>