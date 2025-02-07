<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('comments.index', [
            'comments' => Comment::all()
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment): RedirectResponse
    {
        $validated = $request->validated();

        $comment->author = $validated['author'];
        $comment->email = $validated['email'];
        $comment->content = $validated['content'];
        $comment->is_approved = $validated['is_approved'];
        $comment->rating = $validated['rating'];

        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
