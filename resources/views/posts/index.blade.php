<x-layout>
    <h1 class="welcome-heading">Latest Posts</h1>

    {{-- List of posts --}}
    <div class="post-list">
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    {{-- Pagination links --}}
    <div class="pagination-links">
        {{ $posts->links() }}
    </div>
</x-layout>