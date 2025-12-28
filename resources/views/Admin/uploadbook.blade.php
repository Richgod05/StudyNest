@extends('layouts.layout')

@section('content')
    @include('partials.sidebar')

    <div class="container py-5">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-book-half me-2"></i> Upload New Book
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Add study materials and resources to the Learning Hub</p>
        </div>

        <!-- Book Upload Form -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.storeBook') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Book Name -->
                            <div class="mb-3">
                                <label for="bookName" class="form-label fw-semibold">
                                    <i class="bi bi-pencil-square me-2"></i> Book Name
                                </label>
                                <input type="text" id="bookName" name="name" class="form-control" placeholder="Enter book name" required>
                            </div>

                            <!-- Optional Title -->
                            <div class="mb-3">
                                <label for="bookTitle" class="form-label fw-semibold">Optional Title</label>
                                <input type="text" id="bookTitle" name="title" class="form-control" placeholder="Enter optional title">
                            </div>

                            <!-- Author -->
                            <div class="mb-3">
                                <label for="bookAuthor" class="form-label fw-semibold">Author</label>
                                <input type="text" id="bookAuthor" name="author" class="form-control" placeholder="Enter author name">
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="bookCategory" class="form-label fw-semibold">
                                    <i class="bi bi-tags-fill me-2"></i> Category
                                </label>
                                <select id="bookCategory" name="category_id" class="form-select" required>
                                    <option value="" disabled selected>Choose a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="bookDescription" class="form-label fw-semibold">Description</label>
                                <textarea id="bookDescription" name="description" rows="5" class="form-control" placeholder="Full description..." required></textarea>
                            </div>

                            <!-- Tags -->
                            <div class="mb-3">
                                <label for="bookTags" class="form-label fw-semibold">Tags</label>
                                <input type="text" id="bookTags" name="tags" class="form-control" placeholder="Tags (comma-separated)">
                            </div>

                            <!-- File Upload -->
                            <div class="mb-3">
                                <label for="bookFile" class="form-label fw-semibold">
                                    <i class="bi bi-file-earmark-arrow-up me-2"></i> Upload File
                                </label>
                                <input type="file" id="bookFile" name="file" class="form-control" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 fw-bold">
                                <i class="bi bi-cloud-arrow-up me-1"></i> Upload Book
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection