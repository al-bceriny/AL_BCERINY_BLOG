<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name'    => 'required|min:2|max:50',
            'email'   => 'nullable|email',
            'content' => 'required|min:3',
        ]);

        Comment::create($validated);

        return back()->with('success', 'Comment added!');
    }
}

