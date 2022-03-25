@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Study_record</title>
    </head>
    <body>
        <h3>{{Auth::user()->name}}</h3>
        <h1>Book</h1>
        <form action="/books" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="book[name]" placeholder="タイトル" value=""/>
                <p class="title__error" style="color:red">{{ $errors->first('book.name') }}</p>
                <input type="hidden" name=book[user_id] value="{{Auth::user()->id}}">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/books">back</a>]</div>
    </body>
</html>
@endsection