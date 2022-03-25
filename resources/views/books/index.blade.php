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
        <h3>{{Auth::user()->name}}</h3>
        <h1>Book</h1>
        <div class='posts'>
            @foreach ($books as $book)
                <div class='book'>
                    <h2 class='name'><a href="/books/{{ $book->id }}">{{ $book->name }}</a></h2>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $books->links() }}
        </div>
        [<a href="/books/create">create</a>]
        
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