@extends('Admin/layoutsadmin.adminlayout')

@section('content')

<div class="container py-5 mb-5">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-book-half me-2"></i> Upload New Book
        </h2>
        <p class="text-muted">Complete the details, then write the full description</p>
    </div>

    <!-- Progress -->
    <div class="d-flex justify-content-center mb-4">
        <div class="step active-step me-3">1</div>
        <div class="step-line"></div>
        <div class="step">2</div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 mb-4">
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.storeBook') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- STEP 1 -->
                        <div id="step1">
                            <h5 class="fw-bold mb-3 text-secondary">Step 1: Book Details</h5>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Book Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Optional Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Author</label>
                                <input type="text" name="author" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Category *</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="" disabled selected>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tags</label>
                                <input type="text" name="tags" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Upload Book File *</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>

                            <button type="button" class="btn btn-primary w-100" onclick="goToStep2()">
                                Next → Write Description
                            </button>
                        </div>

                        <!-- STEP 2 -->
                        <div id="step2" style="display:none;">
                            <h5 class="fw-bold mb-3 text-secondary">Step 2: Book Description</h5>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description *</label>
                                <textarea id="bookDescription" name="description" class="form-control" required></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-secondary w-50" onclick="goBackStep1()">
                                    ← Back
                                </button>
                                <button type="submit" class="btn btn-success w-50 fw-bold">
                                    Submit Book
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- TinyMCE -->
<script src="/public/tinymce/tinymce/js/tinymce/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '#bookDescription',
        height: 300,
        menubar: false,
        plugins: 'lists link code',
        toolbar: 'undo redo | bold italic underline | bullist numlist | alignleft aligncenter alignright | code'
    });

    function goToStep2() {
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
        document.querySelectorAll('.step')[1].classList.add('active-step');
    }

    function goBackStep1() {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step1').style.display = 'block';
        document.querySelectorAll('.step')[1].classList.remove('active-step');
    }
</script>

<style>
    .step {
        width: 40px;
        height: 40px;
        background: #dee2e6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #6c757d;
    }

    .active-step {
        background: #1E3A8A;
        color: #fff;
    }

    .step-line {
        width: 60px;
        height: 4px;
        background: #dee2e6;
        margin-top: 18px;
    }
</style>

@endsection
