@props(['card'])

<div class="col">
    <div class="card h-100 card-color">
        <img src="{{ Storage::url($card['image_url']) }}" alt="...">
        <p class="on-image-label">Flag</p>
        <div class="card-body">
            <h5 class="card-title">{{ $card['name'] }}</h5>
            <p class="card-text">{{ $card['short_text'] }}</p>
            <p class="card-text"><b>Author:</b> {{ $card->user->name }}</p>
            <p class="card-text">Created {{ $card->created_at->diffForHumans() }}</p>
        </div>
        
        <form action="{{ route('cards.restore', $card->id) }}" method="POST" style="align-self: center;">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-primary">Restore</button>
        </form>

        <form action="{{ route('cards.forceDelete', $card->id) }}" method="POST" style="align-self: center;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this card permanently?')">Delete forever</button>
        </form>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{ $card['id'] }}">
                View
        </button>
    </div>
</div>  

<div class="modal fade" id="Modal{{ $card['id'] }}" tabindex="-1" aria-labelledby="Modal{{ $card['id'] }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="Modal{{ $card['id'] }}Label">{{ $card['name'] }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $card['long_text'] }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>