@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $book->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <p>{{$post->updated_at}}</p>
                <p>{{ $post->text }}</p>
                <p>{{ (int)($post->learning_hours/60) }}時間{{ $post->learning_hours%60 }}分</p>
                <p class="edit">[<a href="/books/{{ $book->id }}/posts/{{$post->id}}/edit">学習記録を編集する</a>]</p>
                <form action="/books/{{ $book->id }}/posts/{{$post->id}}" id="form_{{ $post->id }}" method="post" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit">学習記録を削除する</button> 
                </form>
            </div>
        </div>
        <div class="footer">
            <a href="/books/{{$book->id}}">戻る</a>
        </div>
    </body>
</html>
@endsection