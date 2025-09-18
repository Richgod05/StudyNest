@extends('layouts.layout')

@section('content')
<section class="nest-chat py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-chat-dots-fill me-2"></i> Nest Chat
                <span class="position-absolute bottom-0 start-50 translate-middle-x border-bottom border-3 border-primary" style="width:50%;"></span>
            </h2>
            <p class="text-muted">Ask questions, share answers, and connect with the StudyNest community</p>
        </div>

        <!-- Search Bar -->
        <div class="mb-4 d-flex justify-content-center fade-in-up">
            <form method="GET" action="{{ route('nestchat.index') }}" class="d-flex search-form">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control"
                        placeholder="Search questions, replies, or keywords..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-arrow-right-circle"></i> Search
                    </button>
                </div>
            </form>
        </div>

        <div class="row">
            <!-- Ask Question Form -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0 fade-in-up hover-lift">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="color:#1E3A8A;">
                            <i class="bi bi-question-circle-fill me-2"></i> Ask a Question
                        </h5>
                        <form method="POST" action="{{ route('nestchat.ask') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Question title..." required>
                            </div>
                            <div class="mb-3">
                                <textarea name="body" class="form-control" rows="4" placeholder="Describe your question..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send-fill me-1"></i> Post Question
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Chat Feed -->
            <div class="col-lg-8">
                @foreach($questions as $question)
                <div class="card mb-5 shadow-sm border-0 fade-in-up hover-lift" data-question-id="{{ $question->id }}">
                    <div class="card-body">
                        <!-- Question -->
                        <h5 class="fw-bold" style="color:#1E3A8A;">{!! $question->title !!}</h5>
                        <p class="text-muted mb-2">{!! $question->body !!}</p>
                        <small class="text-secondary">
                            <i class="bi bi-person-circle me-1"></i> Asked by {{ $question->user->name }} • 
                            <span class="time" data-time="{{ $question->created_at }}">{{ $question->created_at->diffForHumans() }}</span>
                        </small>

                        <!-- Stats -->
                        <div class="mt-2 text-muted small">
                            <i class="bi bi-eye"></i> <span class="views-count">{{ $question->views_count }}</span> views •
                            <i class="bi bi-chat-left-text"></i> <span class="replies-count">{{ $question->replies_count }}</span> replies •
                            <i class="bi bi-hand-thumbs-up"></i> <span class="likes-count">{{ $question->likes_count }}</span> likes
                        </div>

                        <!-- Actions -->
                        <div class="mt-3 d-flex align-items-center gap-3">
                            <form method="POST" action="{{ route('nestchat.like', $question->id) }}" class="like-form">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary action-btn">
                                    <i class="bi bi-hand-thumbs-up-fill"></i> Like
                                </button>
                            </form>
                            <button class="btn btn-sm btn-outline-secondary action-btn" onclick="shareQuestion('{{ route('nestchat.show', $question->id) }}')">
                                <i class="bi bi-share-fill"></i> Share
                            </button>
                        </div>

                        <!-- Replies -->
                        <div class="mt-4 replies-container">
                            <h6 class="fw-bold"><i class="bi bi-chat-left-dots-fill me-1"></i> Replies</h6>
                            @forelse($question->replies as $reply)
                                <div class="p-3 mb-2 bg-light rounded fade-in reply-item">
                                    <p class="mb-1">{!! $reply->body !!}</p>
                                    <small class="text-secondary"><i class="bi bi-person-circle me-1"></i> By {{ $reply->user->name }} • {{ $reply->created_at->diffForHumans() }}</small>
                                </div>
                            @empty
                                <p class="text-muted">No replies yet. Be the first to answer!</p>
                            @endforelse
                        </div>

                        <!-- Reply Form -->
                        <form method="POST" action="{{ route('nestchat.reply', $question->id) }}" class="mt-3 reply-form">
                            @csrf
                            <div class="mb-3">
                                <textarea name="body" class="form-control reply-textarea" rows="4" placeholder="Write your full reply here..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">
                                    <i class="bi bi-reply-fill me-1"></i> Reply
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-4 mb-5 d-flex justify-content-center fade-in-up">
                    {{ $questions->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function shareQuestion(url) {
        if (navigator.share) {
            navigator.share({
                title: 'Check out this question on StudyNest',
                url: url
            });
        } else {
            prompt('Copy this link to share:', url);
        }
    }

    // Auto-update stats every 5 seconds
    setInterval(() => {
        document.querySelectorAll('[data-question-id]').forEach(card => {
            let id = card.getAttribute('data-question-id');
            fetch(`/nestchat/stats/${id}`)
                .then(res => res.json())
                .then(data => {
                    card.querySelector('.views-count').textContent = data.views;
                    card.querySelector('.likes-count').textContent = data.likes;
                    card.querySelector('.replies-count').textContent = data.replies;
                    card.querySelector('.time').textContent = data.time;
                });
        });
    }, 5000);

    // Auto-resize reply textarea
    document.querySelectorAll('.reply-textarea').forEach(textarea => {
        textarea.addEventListener('input', () => {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        });
    });

    // Slide-in animation for new replies
    document.querySelectorAll('.reply-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.reply_html) {
                    const container = this.closest('.card-body').querySelector('.replies-container');
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data.reply_html.trim();
                    const newReply = tempDiv.firstChild;
                    newReply.classList.add('slide-in');
                    container.appendChild(newReply);
                    this.reset();
                }
            });
        });
    });
</script>

<style>
    .fade-in-up { animation: fadeInUp 0.6s ease-in-out; }
    .fade-in-down { animation: fadeInDown 0.6s ease-in-out; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { 
        from { opacity: 0; transform: translateY(-20px); } 
        to { opacity: 1; transform: translateY(0); } 
    }

    /* Slide-in for new replies */
    .slide-in {
        animation: slideIn 0.5s ease forwards;
    }
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Hover lift effect */
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    /* Buttons */
    .action-btn {
        transition: all 0.3s ease;
    }
    .action-btn:hover {
        transform: scale(1.05);
    }

    /* Reply textarea */
    .reply-textarea {
        transition: height 0.2s ease, box-shadow 0.2s ease;
        resize: none;
    }
    .reply-textarea:focus {
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
    }

    /* Pagination */
    .pagination .page-link {
        transition: all 0.3s ease;
    }
    .pagination .page-link:hover {
        background-color: #1E3A8A;
        color: white;
        transform: scale(1.05);
    }

    /* Search form */
    .search-form {
        width: 60%;
        max-width: 600px;
    }
    @media (max-width: 768px) {
        .search-form {
            width: 100%;
        }
    }
</style>
@endsection