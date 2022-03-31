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
        <p class="edit">|<a href="/books/{{$book->id}}/edit">教材名を変更する</a>|</p>
        <form action="/books/{{$book->id}}" id="book_delete" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">教材を削除する</button>
        </form>
        <br>
        <p class="post_create"><a href="/books/{{$book->id}}/posts/create">学習記録をつける</a></p>
        
        <div class="posts">
            @foreach ($posts as $post)
                <div class="updated_at">{{$post->updated_at}}</div>
                <div class="study_hours">{{(int)($post->learning_hours/60)}}時間{{$post->learning_hours%60}}分</div>
                <div class="text"><a href="/books/{{$book->id}}/posts/{{$post->id}}">{{$post->text}}</a></div>
                
                {{--<p class="post_edit"><a href="/posts/{{$book->id}}/edit">学習記録を編集する</a></p>--}}
                {{--<form action="/posts/{{$book->id}}" id="post_delete" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">学習記録を削除する</button>
                </form>--}}
                <hr>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/books">戻る</a>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
    </body>
</html>

@endsection