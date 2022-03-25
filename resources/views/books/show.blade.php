@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Study_record</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $book->name }}
        </h1>
        <p class="edit">|<a href="/books/{{$book->id}}/edit">edit</a>|</p>
        <form action="/books/{{$book->id}}" id="book_delete" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
        {{--
        <div class="book_post">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>  
                <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit">delete</button> 
                </form>
            </div>
        </div>
        --}}
        <div class="footer">
            <a href="/books">戻る</a>
        </div>
    </body>
</html>

@endsection