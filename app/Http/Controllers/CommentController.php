<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function PostComment(Request $request, $id)

    {
        $comment = Comment::query()->create($request->only('user_id', 'topic_id', 'rating','title', 'content','user_name'));

        $comment->users()->sync($request->input('user_id'));

        return redirect()->back()->with('message', 'Bạn đã gửi đánh giá thành công');

    }

    public function review_comment()
    {
        $comments = Comment::with('users')->get();

        return view('users.comment', compact('comments'));
    }
}
