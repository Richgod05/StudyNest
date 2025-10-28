@extends('layouts.layout')

@section('content')
    @include('partials.sidebar') <!-- ✅ Sidebar appears on every book page -->

    <div class="book-container">
        <h1>{{ $book->title ?? $book->name }}</h1> <!-- ✅ Title as main heading -->

        <div class="book-body">
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Uploaded at:</strong> {{ $book->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Tags:</strong> {{ implode(', ', $book->tags ?? []) }}</p>
            <p><strong>Description:</strong></p>
            <div class="book-description">
                {!! nl2br(e($book->description)) !!}
            </div>
        </div>

        <form method="GET" action="{{ route('books.show', $book->id) }}">
            <input type="text" name="q" placeholder="Search in this book..." value="{{ request('q') }}">
            <button type="submit">Search</button>
        </form>

        @if($book->file_path)
            <iframe src="{{ asset('storage/' . $book->file_path) }}" width="100%" height="600px"></iframe>
        @endif
    </div>
@endsection