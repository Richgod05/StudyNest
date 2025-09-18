@extends('layouts.layout')

@section('content')
<section class="nest-drop py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-cloud-arrow-up-fill me-2"></i> NestDrop
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Empower your peers by sharing helpful study materials</p>
        </div>

        <div class="row">
            <!-- Share Material Form -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 fade-in-up hover-scale">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="color:#1E3A8A;">
                            <i class="bi bi-upload me-2"></i> Share Material
                        </h5>
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

                            <!-- Audio Recording -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Optional: Record Audio Explanation</label>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" id="recordBtn" class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-mic-fill"></i> Record
                                    </button>
                                    <audio id="audioPreview" controls class="d-none w-100 mt-2"></audio>
                                    <input type="hidden" name="audio_file" id="audioFileInput">
                                </div>
                                <small class="text-muted">Explain your material in your own voice</small>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send-fill me-1"></i> Upload Material
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Material Cards -->
            <div class="col-lg-8">
                @foreach($materials as $material)
                <div class="card mb-5 shadow-sm border-0 fade-in-up hover-lift">
                    <div class="card-body">
                        <h5 class="fw-bold" style="color:#1E3A8A;">
                            <i class="bi bi-journal-text me-2"></i> {{ $material->title }}
                        </h5>
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
                        <div class="mt-3 d-flex align-items-center gap-2 flex-wrap">
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
                        </div>

                        <!-- File Preview -->
                        @php
                        $fileUrl = Storage::url($material->file_path);
                        $extension = pathinfo($material->file_path, PATHINFO_EXTENSION);
                        @endphp

                        <div class="mt-3">
                            @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                                <img src="{{ $fileUrl }}" alt="Preview" class="img-fluid rounded shadow-sm">
                            @elseif($extension === 'pdf')
                                <iframe src="{{ $fileUrl }}" class="w-100 rounded shadow-sm" style="height: 400px; border: none;"></iframe>
                            @elseif($extension === 'mp3')
                                <audio controls class="w-100">
                                    <source src="{{ $fileUrl }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @else
                                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-sm btn-outline-secondary">
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
    /* Animations */
    .fade-in-up { animation: fadeInUp 0.6s ease-in-out; }
    .fade-in-down { animation: fadeInDown 0.6s ease-in-out; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }

    /* Hover effects */
    .hover-scale:hover { transform: scale(1.02); transition: 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); transition: 0.3s ease; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }

    .badge { font-size: 0.85rem; padding: 0.4em 0.6em; border-radius: 0.25rem; }
</style>

<!-- Audio Recording Script -->
<script>
    let mediaRecorder;
    let audioChunks = [];
    const recordBtn = document.getElementById('recordBtn');
    const audioPreview = document.getElementById('audioPreview');
    const audioFileInput = document.getElementById('audioFileInput');

    recordBtn.addEventListener('click', async () => {
        if (!mediaRecorder || mediaRecorder.state === 'inactive') {
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);
            audioChunks = [];

            mediaRecorder.ondataavailable = e => audioChunks.push(e.data);
            mediaRecorder.onstop = () => {
                const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                const audioUrl = URL.createObjectURL(audioBlob);
                audioPreview.src = audioUrl;
                audioPreview.classList.remove('d-none');

                // Convert to base64 for form submission
                const reader = new FileReader();
                reader.onloadend = () => {
                    audioFileInput.value = reader.result;
                };
                reader.readAsDataURL
                                reader.readAsDataURL(audioBlob);
            };

            mediaRecorder.start();
            recordBtn.innerHTML = '<i class="bi bi-stop-fill"></i> Stop';
            recordBtn.classList.remove('btn-outline-secondary');
            recordBtn.classList.add('btn-danger');
        } else {
            mediaRecorder.stop();
            recordBtn.innerHTML = '<i class="bi bi-mic-fill"></i> Record';
            recordBtn.classList.remove('btn-danger');
            recordBtn.classList.add('btn-outline-secondary');
        }
    });
</script>
@endsection