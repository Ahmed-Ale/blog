<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $comment = $request->validated();

        Comment::create($comment);

        return back()->with('commentSuccess', 'Comment Posted Successfully!');
    }
}
