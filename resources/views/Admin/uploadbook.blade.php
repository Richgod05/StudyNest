@extends('Admin/layoutsadmin.adminlayout')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-book-half me-2"></i> Upload New Book
        </h2>
        <p class="text-muted">Complete the book details, then write the description</p>
    </div>

    <div class="d-flex justify-content-center mb-4 align-items-center">
        <div class="step active-step">1</div>
        <div class="step-line"></div>
        <div class="step">2</div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.storeBook') }}" enctype="multipart/form-data" id="bookForm">
                        @csrf

                        <div id="step1">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Book Name *</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Optional Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Author</label>
                                <input type="text" name="author" id="author" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Category *</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="" disabled selected>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tags</label>
                                <input type="text" name="tags" id="tags" class="form-control" placeholder="tag1, tag2, tag3">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Upload Book File *</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>

                            <button type="button" class="btn btn-primary w-100" onclick="goToStep2()">
                                Next → Write Description
                            </button>
                        </div>

                        <div id="step2" style="display:none;">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description *</label>

                                <div class="editor-toolbar mb-2">
                                    <select class="form-select form-select-sm editor-control" onchange="formatBlock(this.value)">
                                        <option value="p">Paragraph</option>
                                        <option value="h2">Heading 2</option>
                                        <option value="h3">Heading 3</option>
                                    </select>

                                    <select class="form-select form-select-sm editor-control" onchange="changeFontFamily(this.value)">
                                        <option value="Arial, sans-serif">Arial</option>
                                        <option value="Georgia, serif">Georgia</option>
                                        <option value="'Times New Roman', serif">Times New Roman</option>
                                        <option value="Verdana, sans-serif">Verdana</option>
                                        <option value="'Courier New', monospace">Courier New</option>
                                    </select>

                                    <select class="form-select form-select-sm editor-control" onchange="changeFontSize(this.value)">
                                        <option value="14px">14px</option>
                                        <option value="16px" selected>16px</option>
                                        <option value="18px">18px</option>
                                        <option value="20px">20px</option>
                                        <option value="24px">24px</option>
                                    </select>

                                    <select class="form-select form-select-sm editor-control" onchange="changeLineHeight(this.value)">
                                        <option value="1.2">1.2</option>
                                        <option value="1.5" selected>1.5</option>
                                        <option value="1.8">1.8</option>
                                        <option value="2">2.0</option>
                                    </select>

                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('bold')"><b>B</b></button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('italic')"><i>I</i></button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('underline')"><u>U</u></button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('insertUnorderedList')">• List</button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('insertOrderedList')">1. List</button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('justifyLeft')">Left</button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('justifyCenter')">Center</button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="editorCommand('justifyRight')">Right</button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="addParagraph()">+ Paragraph</button>
                                </div>

                                <div id="bookEditor" class="editor-box" contenteditable="true" spellcheck="true"></div>
                                <textarea name="description" id="description" hidden></textarea>
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

<script>
    const form = document.getElementById('bookForm');
    const editor = document.getElementById('bookEditor');
    const hiddenDescription = document.getElementById('description');

    function validateStep1() {
        const fields = [
            document.getElementById('name'),
            document.getElementById('category_id'),
            document.getElementById('file')
        ];

        for (const field of fields) {
            if (!field.checkValidity()) {
                field.reportValidity();
                return false;
            }
        }

        return true;
    }

    function goToStep2() {
        if (!validateStep1()) return;

        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
        document.querySelectorAll('.step')[1].classList.add('active-step');
        editor.focus();
    }

    function goBackStep1() {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step1').style.display = 'block';
        document.querySelectorAll('.step')[1].classList.remove('active-step');
    }

    function syncDescription() {
        hiddenDescription.value = editor.innerHTML.trim();
    }

    function validateDescription() {
        syncDescription();

        const plainText = editor.textContent.trim();
        if (!plainText) {
            alert('Please write a description before submitting.');
            editor.focus();
            return false;
        }

        return true;
    }

    function editorCommand(command) {
        editor.focus();
        document.execCommand(command, false, null);
        syncDescription();
    }

    function formatBlock(tag) {
        editor.focus();
        document.execCommand('formatBlock', false, tag);
        syncDescription();
    }

    function changeFontFamily(font) {
        editor.focus();
        document.execCommand('fontName', false, font);
        syncDescription();
    }

    function changeFontSize(size) {
        editor.style.fontSize = size;
        syncDescription();
    }

    function changeLineHeight(height) {
        editor.style.lineHeight = height;
        syncDescription();
    }

    function addParagraph() {
        editor.focus();
        document.execCommand('insertHTML', false, '<p><br></p>');
        syncDescription();
    }

    editor.addEventListener('input', syncDescription);

    form.addEventListener('submit', function (e) {
        if (document.getElementById('step2').style.display === 'none') {
            e.preventDefault();
            goToStep2();
            return;
        }

        if (!validateStep1()) {
            e.preventDefault();
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
            document.querySelectorAll('.step')[1].classList.remove('active-step');
            return;
        }

        if (!validateDescription()) {
            e.preventDefault();
            return;
        }

        syncDescription();
    });
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
        margin: 0 10px;
    }

    .editor-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }

    .editor-control {
        width: auto;
        min-width: 130px;
    }

    .editor-box {
        min-height: 280px;
        border: 1px solid #ced4da;
        border-radius: 8px;
        padding: 15px;
        background: #fff;
        outline: none;
        line-height: 1.5;
        font-size: 16px;
        font-family: Arial, sans-serif;
        overflow-y: auto;
    }

    .editor-box:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.15);
    }
</style>
@endsection