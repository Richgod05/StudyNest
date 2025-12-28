@extends('layouts.layout')

@section('content')
    @include('partials.sidebar') <!-- Sidebar appears on every page -->

    <div class="container mx-auto px-6 py-8">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-journal-bookmark-fill me-2"></i> Learning Hub
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Discover, search, and access shared study resources</p>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <form method="GET" action="{{ route('learning.hub') }}" class="d-flex justify-content-center">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search books by title, author, or tags..." 
                    value="{{ request('search') }}"
                    class="form-control w-50 me-2 border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
                <button 
                    type="submit" 
                    class="btn btn-primary px-4 py-2 fw-bold"
                >
                    <i class="bi bi-search me-1"></i> Search
                </button>
            </form>
        </div>

        <!-- If no books uploaded -->
        @if(isset($message))
            <div class="bg-warning text-dark p-4 rounded-md text-center fw-semibold">
                {{ $message }}
            </div>
        @else
            <!-- Books Grid -->
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-4 mb-4">
                        <div class="bg-white shadow-lg rounded-lg p-4 h-100 d-flex flex-column justify-content-between">
                            <!-- Book Title -->
                            <h3 class="text-xl fw-bold text-dark mb-2">
                                {{ $book->title ?? $book->name }}
                            </h3>

                            <!-- Book Details -->
                            <div class="text-muted small mb-3">
                                <p><strong>Author:</strong> {{ $book->author ?? 'Unknown' }}</p>
                                <p><strong>Uploaded:</strong> {{ $book->created_at->format('d M Y') }}</p>
                                <p><strong>Tags:</strong>
                                    @if(!empty($book->tags))
                                        <span class="badge bg-primary">{{ implode(', ', $book->tags) }}</span>
                                    @else
                                        <span class="text-secondary">No tags</span>
                                    @endif
                                </p>
                            </div>

                            <!-- View Book Button -->
                            <a href="{{ route('show', $book->id) }}" 
                               class="btn btn-outline-primary fw-bold mt-auto">
                                <i class="bi bi-eye me-1"></i> View Book
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection