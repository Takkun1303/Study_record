@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Study_record</title>
    </head>
    <body>
        <h1>{{$book->name}}</h1>
        <form action="/books/{{$book->id}}/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>学習記録をつける</h2>
                <input type="text" name="text" placeholder="学習記録、一言メモ" value=""/>
                <p class="text__error" style="color:red">{{ $errors->first('text') }}</p>
                
                <select name="learning_hours_hours">
                    @for ($i=0; $i<=23; $i++)
                        <option value="{{$i}}">{{$i}}時間</option>
                    @endfor
                    {{--<p class="hours__error" style="color:red">{{ $errors->first('learning_hours.hours') }}</p>--}}
                </select>
                <select name="learning_hours_minutes">
                    @for ($j=0; $j<=59; $j++)
                        <option value="{{$j}}">{{$j}}分</option>
                    @endfor
                    {{--<p class="minutes__error" style="color:red">{{ $errors->first('learning_hours.minutes') }}</p>--}}
                </select>
                <input type="file" name="image"
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="book_id" value="{{$book->id}}">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/books">back</a>]</div>
    </body>
</html>
@endsection