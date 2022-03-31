<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index(Book $book)
    {
        return view('books/index')->with(['books'=>$book->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('books/create');
    }
    
    public function store(Book $book, BookRequest $request)
    {
        $input=$request['book'];
        $book->fill($input)->save();
        return redirect('/books');
    }
    
    public function show(Book $book)
    {
        return view('books/show')->with(['book'=>$book,'posts'=>$book->postsPaginateByLimit()]);
    }
    
    public function edit(Book $book)
    {
        return view('books/edit')->with(['book'=>$book]);
    }
    
    public function update(Book $book, BookRequest $request)
    {
        $input=$request['book'];
        $book->fill($input)->save();
        return redirect('/books');     
    }
    
    public function delete(Book $book)
    {
        $book->delete();
        return redirect ('/books');
    }
    
    
    
    
}
