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
                    @foreach ($post->postimages as $postimage)
                        <img src="{{ $postimage->file_path }}" />
                    @endforeach
                    <div class="nices">
                    @if($post->users()->where('user_id', Auth::id())->exists())
                        <form action="/posts/{{ $post->id }}/unnices" method="POST">
                            @csrf
                            <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                        </form>
                    @else
                        <form action="/posts/{{ $post->id }}/nices" method="POST">
                            @csrf
                            <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                        </form>
                    @endif
                        <p>いいね数：{{ $post->users()->count() }}</p>
                    </div>
                    <div class="commnet">
                    <a href="/posts/{{ $post->id }}/comment/create"><i class="fa-solid fa-comment"></i></a>
                    @if($post->comment_users()->where('post_id', $post->id)->exists())
                        <p>{{ $post->comment_users()->count() }}</p>
                    @endif
                    </div>
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