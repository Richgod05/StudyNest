@extends('layouts.layout')

@section('content')
<section class="nest-chat py-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#1E3A8A;">Nest Chat</h2>
            <p class="text-muted">Ask questions, share answers, and connect with the StudyNest community</p>
        </div>

        <div class="row">
            <!-- Ask Question Form -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="color:#1E3A8A;">Ask a Question</h5>
                        <form method="POST" action="{{ route('nestchat.ask') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Question title..." required>
                            </div>
                            <div class="mb-3">
                                <textarea name="body" class="form-control" rows="4" placeholder="Describe your question..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Post Question</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Chat Feed -->
            <div class="col-lg-8">
                @foreach($questions as $question)
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <!-- Question -->
                        <h5 class="fw-bold" style="color:#1E3A8A;">{{ $question->title }}</h5>
                        <p class="text-muted mb-2">{{ $question->body }}</p>
                        <small class="text-secondary">Asked by {{ $question->user->name }} • {{ $question->created_at->diffForHumans() }}</small>

                        <!-- Actions -->
                        <div class="mt-3 d-flex align-items-center gap-3">
                            <form method="POST" action="{{ route('nestchat.like', $question->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-hand-thumbs-up"></i> Like ({{ $question->likes_count }})
                                </button>
                            </form>
                            <button class="btn btn-sm btn-outline-secondary" onclick="shareQuestion('{{ route('nestchat.show', $question->id) }}')">
                                <i class="bi bi-share"></i> Share
                            </button>
                        </div>

                        <!-- Replies -->
                        <div class="mt-4">
                            <h6 class="fw-bold">Replies</h6>
                            @forelse($question->replies as $reply)
                                <div class="p-3 mb-2 bg-light rounded">
                                    <p class="mb-1">{{ $reply->body }}</p>
                                    <small class="text-secondary">By {{ $reply->user->name }} • {{ $reply->created_at->diffForHumans() }}</small>
                                </div>
                            @empty
                                <p class="text-muted">No replies yet. Be the first to answer!</p>
                            @endforelse
                        </div>

                        <!-- Reply Form -->
                        <form method="POST" action="{{ route('nestchat.reply', $question->id) }}" class="mt-3">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="body" class="form-control" placeholder="Write a reply..." required>
                                <button class="btn btn-primary" type="submit">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $questions->links() }}
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
</script>
@endsection