@props(['post', 'full' => false])

<div class="post-card">
    <div class="post-image">
        {{-- Cover photo --}}
        <div class="image-container">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
            @else
                <img class="default-image" src="{{ asset('storage/posts_images/default.jpg') }}" alt="Default Image">
            @endif
        </div>

        <div class="post-content">
            {{-- Title --}}
            <h2 class="post-title">{{ $post->title }}</h2>

            {{-- Author and Date --}}
            <div class="post-info">
                <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
                <a href="{{ route('posts.user', $post->user) }}" class="author">{{ $post->user->username }}</a>
            </div>

            {{-- Body --}}
            @if ($full)
                {{-- Show full body text in single post page --}}
                <div class="post-body">
                    <span>{{ $post->body }}</span>
                </div>
            @else
                {{-- Show limited body text in single post page --}}
                <div class="post-body">
                    <span>{{ Str::words($post->body, 5) }}</span>
                    <a href="{{ route('posts.show', $post) }}" class="read-more">Read more &rarr;</a>
                </div>
            @endif
        </div>

    </div>


    {{-- Placeholder for extra elements used in user dashboard --}}
    <div class="extra-elements">
        {{ $slot }}
    </div>
</div>