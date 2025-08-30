@extends('layouts.layout')

@section('content')
<section class="nest-drop py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                NestDrop
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Empower your peers by sharing helpful study materials</p>
        </div>

        <div class="row">
            <!-- Share Material Form -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 fade-in">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="color:#1E3A8A;">Share Material</h5>
                        <form method="POST" action="{{ route('materials.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Title..." required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="3" placeholder="Description..."></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject...">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="level" class="form-control" placeholder="Level (e.g. Form 4, University)">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="tags" class="form-control" placeholder="Tags (comma-separated)">
                            </div>
                            <div class="mb-3">
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Upload Material</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Material Cards -->
            <div class="col-lg-8">
                @foreach($materials as $material)
                <div class="card mb-5 shadow-sm border-0 fade-in">
                    <div class="card-body">
                        <h5 class="fw-bold" style="color:#1E3A8A;">{{ $material->title }}</h5>
                        <p class="text-muted mb-2">{{ $material->description }}</p>
                        <small class="text-secondary">
                            Shared by {{ $material->user->name }} • {{ $material->created_at->diffForHumans() }}
                        </small>

                        <!-- Tags -->
                        <div class="mt-2">
                            @foreach(explode(',', $material->tags) as $tag)
                                <span class="badge bg-primary-subtle text-primary me-1">{{ trim($tag) }}</span>
                            @endforeach
                        </div>

                        <!-- Actions -->
                        <div class="mt-3 d-flex align-items-center gap-3">
                            <form method="POST" action="{{ route('materials.like', $material->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-hand-thumbs-up"></i> Like
                                </button>
                            </form>
                            <form method="POST" action="{{ route('materials.save', $material->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-bookmark"></i> Save
                                </button>
                            </form>
                            <form method="POST" action="{{ route('materials.report', $material->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-flag"></i> Report
                                </button>
                            </form>
                            @php
                            $fileUrl = Storage::url($material->file_path);
                            $extension = pathinfo($material->file_path, PATHINFO_EXTENSION);
                            @endphp

                            @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                            <img src="{{ $fileUrl }}" alt="Preview" class="img-fluid rounded mt-3" style="max-height: 300px;">
                            @elseif($extension === 'pdf')
                                <iframe src="{{ $fileUrl }}" class="w-100 mt-3" style="height: 400px; border: 1px solid #ddd;"></iframe>
                            @elseif($extension === 'mp3')
                                <audio controls class="mt-3 w-100">
                                    <source src="{{ $fileUrl }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                                @else
                                    <a href="{{ $fileUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary mt-3">
                                        <i class="bi bi-download"></i> Download File
                                    </a>
                                @endif
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-4 mb-5 d-flex justify-content-center">
                    {{ $materials->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .fade-in {
        animation: fadeInUp 0.6s ease-in-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.6em;
        border-radius: 0.25rem;
    }
</style>
@endsection