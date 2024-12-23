<div class="col">
    <div class="card h-100 card-color">
        <img src="{{ Storage::url($card['image_url']) }}" class="img-fluid" alt="...">
        <p class="on-image-label">Flag</p>
        <div class="card-body">
        <h5 class="card-title">{{ $card['name'] }}</h5>
        <p class="card-text">{{ $card['short_text'] }}</p>
        </div>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{ $card['id'] }}">
                View
        </button>
        <a class="btn btn-primary" href="/cards/{{ $card->id  }}/edit">Edit</a>
        <a class="a-button"><form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">Delete</button>
        </form></a>
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
