<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Reply;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;



class HomepageController extends Controller
{
    
   /**
     * Display Nest Chat feed
     */
    public function index()
    {
        $questions = Question::with(['user', 'replies.user'])
            ->withCount('likes')
            ->latest()
            ->paginate(10);

        return view('nestchat', compact('questions'));
    }

    /**
     * Handle asking a new question
     */
    public function askQuestion(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'title'   => $request->title,
            'body'    => $request->body,
        ]);

        return redirect()->back()->with('success', 'Your question has been posted!');
    }

    /**
     * Handle replying to a question
     */
    public function replyToQuestion(Request $request, $questionId)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        Reply::create([
            'question_id' => $questionId,
            'user_id'     => Auth::id(),
            'body'        => $request->body,
        ]);

        return redirect()->back()->with('success', 'Your reply has been posted!');
    }

    /**
     * Handle liking a question
     */
    public function likeQuestion($questionId)
    {
        $question = Question::findOrFail($questionId);

        // Prevent duplicate likes from the same user
        $alreadyLiked = Like::where('user_id', Auth::id())
            ->where('question_id', $questionId)
            ->exists();

        if (!$alreadyLiked) {
            Like::create([
                'user_id'     => Auth::id(),
                'question_id' => $questionId,
            ]);

            // Increment cached like count
            $question->increment('likes_count');
        }

        return redirect()->back();
    }

    /**
     * Show a single question with replies
     */
    public function showQuestion($id)
    {
    $question = Question::with(['user', 'replies.user', 'likes'])
        ->findOrFail($id);

    // Increment the views count
    $question->increment('views_count');

    return view('nest-chat-single', compact('question'));
    }
    public function stats($id)
    {
    $question = Question::withCount(['likes', 'replies'])
        ->findOrFail($id);

    return response()->json([
        'views' => $question->views_count,
        'likes' => $question->likes_count,
        'replies' => $question->replies_count,
        'time' => $question->created_at->diffForHumans()
    ]);
    }
}