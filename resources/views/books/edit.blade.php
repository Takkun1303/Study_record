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
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/books/{{ $book->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='book[name]' value="{{ $book->name }}">
                </div>
                <input type="hidden" name='book[user_id]' value="{{Auth::user()->id}}">
                <input type="submit" value="保存">
            </form>
        </div>
        <a href="/books/{{$book->id}}">戻る</a>
    </body>
</html>
@endsection