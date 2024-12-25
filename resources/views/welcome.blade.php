<x-app-layout>
    <div class="cards-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 g-4">
                @foreach ($cards as $card)
                    <x-fullcard :card="$card"/>
                @endforeach
        </div>
    </div>
</x-app-layout>