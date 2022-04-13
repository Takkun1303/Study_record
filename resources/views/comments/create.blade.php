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
        <p>{{ $post->user->name }}</p>
        <h1 class="title">
            {{ $post->book->name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <p>{{$post->updated_at}}</p>
                <p>{{ $post->text }}</p>
                <p>{{ (int)($post->learning_hours/60) }}時間{{ $post->learning_hours%60 }}分</p>
                @foreach($post->postimages as $postimage)
                    <img src="{{ $postimage->file_path }}" />
                @endforeach
                @if($post->comment_users()->where('post_id', $post->id)->exists())
                    @foreach($post->comment_users as $comment)
                        <div class="comment">
                            <h4>{{ $comment->name }}</h4>
                            <p>{{ $comment->pivot->comment }}</p>
                        </div>
                    @endforeach
                @endif
                <form action="/posts/{{ $post->id }}/comment" method="post">
                  @csrf
                  <input type="text" name="comment" placeholder="コメント" value=""/>
                  <input type="submit" value="投稿"/>
                </form>
            </div>
        </div>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>
@endsection
                            