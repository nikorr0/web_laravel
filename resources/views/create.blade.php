<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Create</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>
        <div class="container" style="margin-top: 10%;">
            <h1 class="mb-4">Add new card</h1>
            <form action="/cards" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Country name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="short_text" class="form-label">Short text</label>
                    <textarea
                        type="text"
                        class="form-control @error('short_text') is-invalid @enderror"
                        id="short_text"
                        name="short_text"
                        value="{{ old('short_text') }}"
                        required
                    >{{ old('short_text') }}</textarea>
                    @error('short_text')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="long_text" class="form-label">Long text</label>
                    <textarea
                        type="text"
                        class="form-control @error('long_text') is-invalid @enderror"
                        id="long_text"
                        name="long_text"
                        value="{{ old('long_text') }}"
                        required
                    >{{ old('long_text') }}</textarea>
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
                        required
                    >
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="/cards" class="btn btn-primary">Cancel</a>
            </form>
        </div>
    <script src="../main.js"></script>  
    </body>
</html>