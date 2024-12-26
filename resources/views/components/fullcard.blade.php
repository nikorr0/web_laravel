@props(['card'])
<div class="col">
    <div class="card h-100 card-color">
        <img src="{{ Storage::url($card['image_url']) }}" alt="...">
        <p class="on-image-label">Flag</p>
        <div class="card-body">
            <h5 class="card-title">{{ $card['name'] }}</h5>
            <p class="card-text">{{ $card['short_text'] }}</p>
            <p class="card-text"><b>Author:</b> {{ $card->user->name }}</p>
        </div>
        
        @if(auth()->user() && (auth()->user()->id == $card->user_id || auth()->user()->is_admin))
            <a class="btn btn-primary" href="/cards/{{ $card->id }}/edit">Edit</a>
            <a class="a-button">
                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
            </a>
        @endif

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{ $card['id'] }}">
            View
        </button>

        @if(auth()->user())
            <button type="button" class="btn btn-secondary mt-3" onclick="toggleComments({{ $card['id'] }})">
                Comment
            </button>

            <div id="comments-section-{{ $card['id'] }}" style="display: none;" class="mt-3">
                <form class="comment-keys-block" action="{{ route('comments.store', $card) }}" method="POST">
                    @csrf
                    <textarea name="content" class="comment-form" placeholder="Your thoughts"></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
                <ul class="list-group mt-3">
                    @foreach($card->comments->sortByDesc('created_at') as $comment)
                        <li class="list-group-item @if(auth()->check() && auth()->user()->friends->contains($comment->user)) @endif comments-block">
                            <strong>
                                @if(auth()->check() && auth()->user()->friends->contains($comment->user))
                                    <i class="text-warning">*</i>
                                @endif
                                {{ $comment->user->name }} {{ $comment->created_at->diffForHumans() }}
                            </strong>
                            <br>{{ $comment->content }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
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