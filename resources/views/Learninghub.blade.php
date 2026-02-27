@extends('layouts.layout')

@section('content')
    <div class="container-fluid py-4 fade-in-down">
        <div class="text-center mb-5">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-journal-bookmark-fill me-2"></i> Learning Hub
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Discover, search, and access shared study resources</p>
        </div>

        <div class="mb-5 d-flex justify-content-center">
            <form method="GET" action="{{ route('learning.hub') }}" class="w-100" style="max-width: 600px;">
                <div class="input-group shadow-sm rounded-pill overflow-hidden p-1 bg-white">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search books by title, author, or tags..." 
                        value="{{ request('search') }}"
                        class="form-control border-0 px-4 py-2"
                        style="box-shadow: none !important;"
                    >
                    <button 
                        type="submit" 
                        class="btn btn-primary fw-bold px-4 rounded-pill"
                    >
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        @if(isset($message))
            <div class="alert alert-warning text-center fw-semibold shadow-sm rounded-4">
                <i class="bi bi-exclamation-triangle me-2"></i> {{ $message }}
            </div>
        @else
            <div class="row g-4">
                @forelse($books as $book)
                    <div class="col-xl-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm hover-card rounded-4 overflow-hidden">
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="fw-bold text-dark mb-3">
                                    {{ $book->title ?? $book->name }}
                                </h5>

                                <div class="text-muted small mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-person text-primary me-2"></i>
                                        <span><strong>Author:</strong> {{ $book->author ?? 'Unknown' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-event text-primary me-2"></i>
                                        <span><strong>Uploaded:</strong> {{ $book->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <i class="bi bi-tags text-primary me-2"></i>
                                        @if(!empty($book->tags))
                                            @foreach(explode(',', is_array($book->tags) ? implode(',', $book->tags) : $book->tags) as $tag)
                                                <span class="badge bg-light text-primary border border-primary-subtle me-1 mb-1">
                                                    {{ trim($tag) }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="text-secondary opacity-50 small italic">No tags</span>
                                        @endif
                                    </div>
                                </div>

                                <a href="{{ route('books.show', $book->id) }}" 
                                   class="btn btn-outline-primary fw-bold mt-auto w-100 rounded-pill">
                                    <i class="bi bi-eye me-1"></i> View Book
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-book text-muted fs-1 mb-3"></i>
                        <p class="text-muted">No books found in the Learning Hub.</p>
                    </div>
                @endforelse
            </div>
        @endif
    </div>

    <style>
        .hover-card {
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(30, 58, 138, 0.1) !important;
        }
    </style>
@endsection