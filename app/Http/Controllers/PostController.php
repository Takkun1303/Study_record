<?php

namespace App\Http\Controllers;

use App\Post;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts'=>$post->getPaginateByLimit()]);
    }
    
    public function show(Book $book, Post $post)
    {
        return view('posts/show')->with(['book'=>$book, 'post'=>$post]);
    }
    
    public function create(Book $book)
    {
        return view('posts/create')->with(['book'=>$book]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $minutes=$request->learning_hours_hours*60 + $request->learning_hours_minutes;
        
        $post->fill([
            'text'=>$request->text,
            'learning_hours'=>$minutes,
            'user_id'=>$request->user_id,
            'book_id'=>$request->book_id,
            ]);
            
        $post->save();
        return redirect('/books/' . $post->book_id . '/posts/' . $post->id);

        
    }
    
    public function edit(Book $book, Post $post)
    {
        return view('posts/edit')->with(['post'=>$post, 'book'=>$book]);
    }
    
    public function update(Book $book, Post $post, PostRequest $request)
    {
        $minutes=$request->learning_hours_hours*60 + $request->learning_hours_minutes;
        
        $post->fill([
            'text'=>$request->text,
            'learning_hours'=>$minutes,
            'user_id'=>$request->user_id,
            'book_id'=>$request->book_id,
            ]);
            
        $post->save();
        return redirect('/books/' . $post->book_id . '/posts/' . $post->id);
    }
    
    public function delete(Book $book, Post $post)
    {
        $post->delete();
        return redirect('/books/'. $post->book_id);
    }
}
