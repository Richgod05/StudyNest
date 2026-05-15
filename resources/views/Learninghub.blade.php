@extends('layouts.layout')
@section('title', 'Learning Hub - StudyNest')

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
                <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    @if(isset($message))
        <div class="alert alert-warning text-center fw-semibold shadow-sm rounded-4">
            <i class="bi bi-exclamation-triangle me-2"></i> {{ $message }}
        </div>
    @elseif(isset($book) && $book)
        @php
            $imageUrl = $book->file ? \Storage::url($book->file) : null;
            $tags = !empty($book->tags)
                ? (is_array($book->tags) ? $book->tags : explode(',', $book->tags))
                : [];
        @endphp

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden w-100 hover-card">
                    <div class="position-relative book-image-wrap">
                        @if($imageUrl)
                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $book->title ?? $book->name }}"
                                class="w-100 book-image"
                            >
                        @else
                            <div class="book-placeholder d-flex align-items-center justify-content-center">
                                <i class="bi bi-book text-secondary fs-1"></i>
                            </div>
                        @endif

                        <div class="book-title-overlay">
                            <h3 class="fw-bold mb-0 text-white text-center px-3">
                                {{ $book->title ?? $book->name }}
                            </h3>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="d-flex flex-wrap gap-4 align-items-center mb-3 text-muted small">
                            <span class="d-flex align-items-center">
                                <i class="bi bi-person text-primary me-2"></i>
                                <strong class="me-1">Author:</strong> {{ $book->author ?? 'Unknown' }}
                            </span>

                            <span class="d-flex align-items-center">
                                <i class="bi bi-calendar-event text-primary me-2"></i>
                                <strong class="me-1">Uploaded:</strong> {{ $book->created_at->format('d M Y') }}
                            </span>

                            <span class="d-flex align-items-center flex-wrap">
                                <i class="bi bi-tags text-primary me-2"></i>
                                <strong class="me-1">Tags:</strong>
                                @if(count($tags))
                                    @foreach($tags as $tag)
                                        @if(trim($tag) !== '')
                                            <span class="badge bg-light text-primary border border-primary-subtle me-1 mb-1">
                                                {{ trim($tag) }}
                                            </span>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-secondary opacity-50 fst-italic">No tags</span>
                                @endif
                            </span>
                        </div>

                        <div class="book-description text-muted">
                            {!! $book->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center fw-semibold shadow-sm rounded-4">
            <i class="bi bi-book me-2"></i> Open any book
        </div>
    @endif
</div>

<style>
    .hover-card {
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(30, 58, 138, 0.1) !important;
    }

    .book-image-wrap {
        height: 420px;
        overflow: hidden;
        background: #f8f9fa;
        position: relative;
    }

    .book-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .book-placeholder {
        width: 100%;
        height: 100%;
        background: #eef2ff;
    }

    .book-title-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding: 18px 10px;
        background: linear-gradient(to bottom, rgba(0,0,0,0.75), rgba(0,0,0,0));
    }

    .book-description {
        line-height: 1.8;
        font-size: 1rem;
    }
</style>
@endsection