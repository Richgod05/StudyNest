@extends('layouts.layout')

@section('content')
    @include('partials.sidebar') <!-- Sidebar appears on every page -->

    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Learning Hub</h1>

        <!-- If no books uploaded -->
        @if(isset($message))
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded-md">
                {{ $message }}
            </div>
        @else
            <!-- Books Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($books as $book)
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between">
                        <!-- Book Title -->
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $book->title ?? $book->name }}
                        </h2>

                        <!-- Book Details -->
                        <div class="text-gray-600 text-sm space-y-1">
                            <p><span class="font-semibold">Author:</span> {{ $book->author ?? 'Unknown' }}</p>
                            <p><span class="font-semibold">Uploaded:</span> {{ $book->created_at->format('d M Y') }}</p>
                            <p><span class="font-semibold">Tags:</span>
                                @if(!empty($book->tags))
                                    <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded-md text-xs">
                                        {{ implode(', ', $book->tags) }}
                                    </span>
                                @else
                                    <span class="text-gray-400">No tags</span>
                                @endif
                            </p>
                        </div>

                        <!-- View Book Button -->
                        <div class="mt-4">
                            <a href="{{ route('learning.hub', $book->id) }}"
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                                View Book
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection