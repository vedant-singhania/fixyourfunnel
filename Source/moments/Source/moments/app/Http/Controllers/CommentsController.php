<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        //
        request()->validate([
            'body' => 'required|max:500', // max 500 characters allowed per comment
        ]);

        $post = Post::findOrFail($request->post_id);
        $post_id = $post->id;

        Comment::create([
           'body' => $request->body,
           'user_id' => auth()->user()->id,
           'post_id' => $post_id
        ]);

        return redirect("/posts/{$post_id}");
    }


}
