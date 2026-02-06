@extends('layouts.layout')

@section('content')
    @include('partials.sidebar') <!-- Sidebar appears on every page -->

    <div class="container mx-auto px-6 py-8 mb-5 with-sidebar">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-journal-bookmark-fill me-2"></i> Learning Hub
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Discover, search, and access shared study resources</p>
        </div>

        <!-- Search Bar -->
        <div class="mb-5">
            <form method="GET" action="{{ route('learning.hub') }}" class="d-flex justify-content-center gap-2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search books by title, author, or tags..." 
                    value="{{ request('search') }}"
                    class="form-control w-50 rounded-pill px-4 py-2 shadow-sm"
                >
                <button 
                    type="submit" 
                    class="btn btn-primary fw-bold px-4 rounded-pill shadow-sm"
                >
                    <i class="bi bi-search me-1"></i> Search
                </button>
            </form>
        </div>

        <!-- Empty State -->
        @if(isset($message))
            <div class="alert alert-warning text-center fw-semibold shadow-sm">
                <i class="bi bi-exclamation-triangle me-1"></i> {{ $message }}
            </div>
        @else
            <!-- Books Grid -->
            <div class="row g-4">
                @foreach($books as $book)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body d-flex flex-column">
                                <!-- Book Title -->
                                <h5 class="fw-bold text-dark mb-2">
                                    {{ $book->title ?? $book->name }}
                                </h5>

                                <!-- Book Details -->
                                <div class="text-muted small mb-3">
                                    <p class="mb-1">
                                        <i class="bi bi-person me-1"></i>
                                        <strong>Author:</strong> {{ $book->author ?? 'Unknown' }}
                                    </p>
                                    <p class="mb-1">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <strong>Uploaded:</strong> {{ $book->created_at->format('d M Y') }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="bi bi-tags me-1"></i>
                                        <strong>Tags:</strong>
                                        @if(!empty($book->tags))
                                            @foreach(explode(',', implode(',', $book->tags)) as $tag)
                                                <span class="badge bg-primary me-1">{{ trim($tag) }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-secondary">No tags</span>
                                        @endif
                                    </p>
                                </div>

                                <!-- View Button -->
                                <a href="#" 
                                   class="btn btn-outline-primary fw-bold mt-auto w-100 rounded-pill">
                                    <i class="bi bi-eye me-1"></i> View Book
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Subtle Hover Effect -->
    <style>
        .hover-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .hover-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }
    </style>
@endsection
