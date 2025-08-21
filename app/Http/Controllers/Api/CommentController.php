<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Card;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        $cards = Card::with('user')
                     ->latest()
                     ->paginate(20);

        return CardResource::collection($cards); 
    }

    /** POST /api/comments  (body: card_id, text) */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'card_id' => 'required|exists:cards,id',
    //         'text'    => 'required|string|max:1000',
    //     ]);

    //     $comment = Comment::create([
    //         'card_id' => $data['card_id'],
    //         'user_id' => $request->user()->id,
    //         'text'    => $data['text'],
    //     ]);

    //     return new CommentResource($comment->load('author')->additional(['message' => 'Comment added'])); 
    // }

    // /** DELETE /api/comments/{comment} */
    // public function destroy(Comment $comment)
    // {
    //     Gate::authorize('delete', $comment);

    //     $comment->delete();

    //     return response()->json(['message' => 'Comment deleted'], 204);
    // }

    public function store(Request $request, Card $card)
    {
        $data = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // создаём комментарий, автоматически ставим user_id из токена
        $comment = $card->comments()->create([
            'content'    => $data['content'],
            'user_id' => $request->user()->id,
        ]);

        // возвращаем свежесозданный ресурс с HTTP 201
        return (new CommentResource(
            $comment->load('user')    // подгружаем автора
        ))->additional(['message' => 'Comment added'])
          ->response()
          ->setStatusCode(201);
    }

    /**
     * DELETE /api/comments/{comment}
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $comment->delete();

        return response()->json(['message' => 'Comment deleted'], 204);
    }
}
