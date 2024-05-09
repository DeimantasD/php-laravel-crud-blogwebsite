<x-layout>
    {{-- Heading --}}
    <h1 class="welcome-heading">{{ $user->username }}'s Posts &#9830; {{ $posts->total() }}</h1>

    {{-- User's posts --}}
    <div class="user-posts">
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    {{-- Pagination links --}}
    <div class="pagination-links">
        {{ $posts->links() }}
    </div>
</x-layout>