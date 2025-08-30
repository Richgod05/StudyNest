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
        ->select('id', 'user_id', 'title', 'body', 'likes_count', 'replies_count', 'views_count', 'created_at')
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
        ->select('id', 'user_id', 'title', 'body', 'likes_count', 'replies_count', 'views_count', 'created_at')
        ->findOrFail($id);

    // Increment the views count
    $question->increment('views_count');

    return view('nest-chat-single', compact('question'));
    }


    public function stats($id)
    {
    $question = Question::select('likes_count', 'replies_count', 'views_count', 'created_at')
        ->findOrFail($id);

    return response()->json([
        'views'   => $question->views_count,
        'likes'   => $question->likes_count,
        'replies' => $question->replies_count,
        'time'    => $question->created_at->diffForHumans()
    ]);
    }
public function search(Request $request)
{
    $search = $request->input('search');

    $questions = Question::with(['user', 'replies.user'])
        ->when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%")
                  ->orWhereHas('replies', function ($q) use ($search) {
                      $q->where('body', 'like', "%{$search}%");
                  });
        })
        ->latest()
        ->paginate(10);

    // Highlight matches
    if ($search) {
        $highlight = function ($text) use ($search) {
            return preg_replace(
                "/(" . preg_quote($search, '/') . ")/i",
                '<mark>$1</mark>',
                $text
            );
        };

        foreach ($questions as $question) {
            $question->title = $highlight($question->title);
            $question->body = $highlight($question->body);

            foreach ($question->replies as $reply) {
                $reply->body = $highlight($reply->body);
            }
        }
    }

    return view('nestchat', compact('questions', 'search'));
}
}



