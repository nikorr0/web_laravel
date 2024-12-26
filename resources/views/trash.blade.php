<x-app-layout>
    <div class="card-list-name">
          <h1>List of deleted cards</h1>
    </div>
    <div class="cards-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 g-4">
                @foreach ($cards as $card)
                    <x-trashcard :card="$card"/>
                @endforeach
        </div>
    </div>
</x-app-layout>