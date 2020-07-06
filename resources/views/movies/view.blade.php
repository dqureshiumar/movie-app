@extends('layouts.app')
@section('content')
<div class="container">
    <a href="/home" class="btn btn-warning">&laquo;Go Back</a>
    <h1>{{$movie->movie_name}}</h1>
    @if($movie->movie_poster == 'default.jpg')
    <img style="width:350px;height:350px" src="/default.jpg">
    @else
    <img style="width:350px;height:350px" src="/storage/movie_poster/{{$movie->movie_poster}}">
    @endif
    <br><br>
    <div>
        {{$movie->movie_description}}
    </div>
    <small>Uploaded on {{$movie->created_at}}</small>
    <hr>
</div>
@endsection