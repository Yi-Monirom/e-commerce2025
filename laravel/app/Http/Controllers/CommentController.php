<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $commentableClass = $request->type; // Article::class, Author::class, Audience::class
        $commentable = $commentableClass::findOrFail($request->id);

        return $commentable->comments()->create([
            'user_id' => $request->user_id,
            'content' => $request->content
        ]);
    }

    public function index()
    {
        return Comment::with('commentable')->get();
    }
}
