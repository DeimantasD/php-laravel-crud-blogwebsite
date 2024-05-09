<x-layout>
    {{-- Heading --}}
    <h1 class="welcome-heading">Welcome {{ auth()->user()->username }}, you have &#9830; {{ $posts->total() }} posts</h1>
  
    <div class="create-post-section">
        <h2>Create a new post</h2>
  
        {{-- Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" color="background-color: #41e62c" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" color="background-color: red" />
        @endif
  
        {{-- Create Post Form --}}
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="post-form">
            @csrf
  
            {{-- Post Title --}}
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="input-field">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
  
            {{-- Post Body --}}
            <div class="form-group">
                <label for="body">Post Content</label>
                <textarea name="body" rows="4" class="input-field">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
  
            {{-- Post Image --}}
            <div class="form-group">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image" class="file-input">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
  
            {{-- Submit Button --}}
            <button class="submit-button">Create</button>
  
        </form>
    </div>
  
    {{-- User Posts --}}
    <h2 class="latest-posts-heading">Your Latest Posts</h2>
  
  
    <div class="user-posts">
        @foreach ($posts as $post)
            {{-- Post card component --}}
            <x-postCard :post="$post">
  
                <div class="post-actions">
                    {{-- Update post --}}
                    <a href="{{ route('posts.edit', $post) }}" class="update-link">Update</a>
  
                    {{-- Delete post --}}
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button">Delete</button>
                    </form>
                </div>
            </x-postCard>
        @endforeach
    </div>
  
    {{-- Pagination links --}}
    <div class="pagination-links">
        {{ $posts->links() }}
    </div>
  
</x-layout>

