<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostcommentUser;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Post $post)
    {
        return view('comments/create')->with(['post'=>$post]);
    }
    
    public function store(Post $post,Request $request)
    {
        $post->comment_users()->attach(Auth::id(),['comment'=>$request->comment]);
        
        return redirect('/posts');
    }
}
