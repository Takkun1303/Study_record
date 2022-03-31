@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Study_record</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>学習記録投稿一覧</h1>
        <div class='index'>
            @foreach ($posts as $post)
                <div class='posts'>
                    <h2 class='user_name'>{{ $post->user->name }}</h2>
                    <h3 class='book_name'>{{ $post->book->name }}</h3>
                    <h4 class='time'>{{ $post->updated_at }}</h4>
                    <p class="learning_hours">{{ (int)($post->learning_hours/60) }}時間{{ $post->learning_hours%60 }}分</p>
                    <p class="text">{{ $post->text }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        [<a href="/books">戻る</a>]
        {{--
        <div>
            @foreach($questions as $question)
                <div>
                    <a href="https://teratail.com/questions/{{ $question['id'] }}">
                    {{ $question['title'] }}
                    </a>
                </div>
            @endforeach
        </div>
        --}}

    </body>
</html>
@endsection