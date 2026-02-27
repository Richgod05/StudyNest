<div class="hub-nav">
    <h6 class="text-uppercase fw-bold text-muted small mb-3 letter-spacing-1">
        <i class="bi bi-grid-fill me-2"></i> Categories
    </h6>
    
    <div class="nav flex-column">
        @foreach($categories as $category)
            <div class="mb-1">
                <a class="nav-link d-flex justify-content-between align-items-center rounded-3 p-2 text-dark fw-medium" 
                   style="transition: 0.2s;"
                   onmouseover="this.style.backgroundColor='#eff6ff'" 
                   onmouseout="this.style.backgroundColor='transparent'"
                   data-bs-toggle="collapse" 
                   href="#sideCat{{ $category->id }}">
                    <span><i class="bi bi-folder2 me-2 text-primary"></i> {{ $category->name }}</span>
                    <i class="bi bi-chevron-down small opacity-50"></i>
                </a>
                
                <div id="sideCat{{ $category->id }}" class="collapse ps-3">
                    @foreach($category->books as $book)
                        <a href="{{ route('books.show', $book->id) }}" class="nav-link py-1 text-muted small">
                            <i class="bi bi-book me-2"></i> {{ $book->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>