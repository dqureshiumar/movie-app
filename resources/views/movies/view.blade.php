@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/home" class="btn btn-warning">&laquo;Go Back</a>
    <h1>{{$movie->movie_name}}</h1>
    @if($movie->movie_poster == 'default.jpg')
        <img src="/default.jpg">
    @elseif($movie->isIMDB == 'yes')
        <img src="{{$movie->movie_poster}}">
    @else
        <img src="/storage/movie_poster/{{$movie->movie_poster}}">
    @endif
    <br><br>
    <div style="font-size: 26px">
        {{$movie->movie_description}}
    </div>
    <small>Uploaded on {{$movie->created_at}}</small>
    <hr>
</div>
@endsection
