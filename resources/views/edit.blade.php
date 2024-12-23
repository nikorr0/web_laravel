<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>
        @include('includes.header')
        <div class="container mt-5">
            <h1 class="mb-4">Edit card</h1>
            <form action="{{ route('cards.update', $card->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Country name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name', $card->name) }}"
                        required
                    >
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="short_text" class="form-label">Short text</label>
                    <textarea
                        class="form-control @error('short_text') is-invalid @enderror"
                        id="short_text"
                        name="short_text"
                        required
                    >{{ old('short_text', $card->short_text) }}</textarea>
                    @error('short_text')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="long_text" class="form-label">Long text</label>
                    <textarea
                        class="form-control @error('long_text') is-invalid @enderror"
                        id="long_text"
                        name="long_text"
                        required
                    >{{ old('long_text', $card->long_text) }}</textarea>
                    @error('long_text')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Flag</label>
                    <input
                        type="file"
                        class="form-control @error('image') is-invalid @enderror"
                        id="image"
                        name="image"
                        accept="image/*"
                    >
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($card->image_url)
                        <div class="mt-3">
                            <p>Current image:</p>
                            <img src="{{ Storage::url($card['image_url']) }}" alt="{{ $card->name }}" class="img-thumbnail" style="max-width: 150px;">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/cards" class="btn btn-primary">Cancel</a>
            </form>
        </div>
    <script src="../../main.js"></script>  
    </body>
</html>