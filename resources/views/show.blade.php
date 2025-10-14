<!-- resources/views/books/show.blade.php -->
@extends('layouts.layout')
@include('partials.sidebar') <!-- ✅ Sidebar appears on every book page -->

<h2>{{ $book->name }}</h2>
<p><strong>Author:</strong> {{ $book->author }}</p>
<p><strong>Uploaded at:</strong> {{ $book->created_at->format('d M Y, H:i') }}</p>
<p><strong>Tags:</strong> {{ implode(', ', $book->tags ?? []) }}</p>
<p><strong>Description:</strong> {!! nl2br(e($book->description)) !!}</p>

<form method="GET" action="{{ route('books.show', $book->id) }}">
    <input type="text" name="q" placeholder="Search in this book..." value="{{ request('q') }}">
    <button type="submit">Search</button>
</form>

<iframe src="{{ asset('storage/' . $book->file_path) }}" width="100%" height="600px"></iframe>
