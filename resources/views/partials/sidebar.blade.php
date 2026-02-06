<!-- resources/views/partials/sidebar.blade.php -->
<div class="sidebar">
    <h5 class="sidebar-title">
        <i class="bi bi-list me-1"></i> Categories
    </h5>

    <ul class="list-unstyled">
        @foreach($categories as $category)
            <li class="mb-2">
                <a class="sidebar-link" data-bs-toggle="collapse" href="#cat{{ $category->id }}">
                    <i class="bi bi-folder2-open me-1"></i> {{ $category->name }}
                </a>
                <ul id="cat{{ $category->id }}" class="collapse list-unstyled ps-3 mt-1">
                    @foreach($category->books as $book)
                        <li class="mb-1">
                            <a class="book-link" href="{{ route('books.show', $book->id) }}">
                                <i class="bi bi-book me-1"></i> {{ $book->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
