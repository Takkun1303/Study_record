@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    [<a href='/books'>戻る</a>]
    <div id='calendar'>
         <script src="{{ mix('js/app.js') }}"></script>
    </div>
</body>
</html>
@endsection