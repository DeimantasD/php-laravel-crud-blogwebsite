<x-layout class="edit-container">
    <a href="{{ route('dashboard') }}" class="back-link">&larr; Go back to your dashboard</a>

    {{-- Update form card --}}
    <div class="update-form-card">
        <h2 class="update-heading">Update your post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="update-form">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="form-group">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="form-group">
                <label for="body" class="form-label">Post Content</label>
                <textarea name="body" rows="4" class="form-control">{{ $post->body }}</textarea>
                @error('body')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Current cover photo if exists --}}
            @if ($post->image)
                <div class="image-preview">
                    <label class="form-label">Current cover photo</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="preview-image">
                </div>
            @endif

            {{-- Post Image --}}
            <div class="form-group">
                <label for="image" class="form-label">Cover photo</label>
                <input type="file" name="image" id="image" class="form-control-file">
                @error('image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button class="submit-button">Update</button>
        </form>
    </div>
</x-layout>