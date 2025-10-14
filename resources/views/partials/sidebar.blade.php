<!-- resources/views/partials/sidebar.blade.php -->
<div class="sidebar">
    <ul>
        @foreach($categories as $category)
            <li>
                <a data-bs-toggle="collapse" href="#cat{{ $category->id }}">
                    {{ $category->name }}
                </a>
                <ul id="cat{{ $category->id }}" class="collapse">
                    @foreach($category->books as $book)
                        <li><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>