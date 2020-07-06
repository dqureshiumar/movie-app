@extends('layouts.app')

@section('content')
@if(auth()->user()->isAdmin == 1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{auth()->user()->name}}'s {{ __('Dashboard') }}
                <a style="float:right" href="{{route('movie.create')}}" class="btn btn-primary btn-sm">Add Movie</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>List of Movies</h3>
                    @if(!$movies->isEmpty())
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                    ?>
                                    @foreach($movies as $movie)
                                    <?php
                                    $i = $i+1;
                                    ?>
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$movie->movie_name}}</td>
                                        <td>{{str_limit($movie->movie_description, 30)}}</td>
                                        <td><a href="/movie/{{$movie->id}}" class="btn btn-sm">View</a> 
                                            <a href="/movie/{{$movie->id}}/edit" class="btn btn-sm btn-success">Edit</a> 
                                            <form action="{{ route('movie.destroy', $movie->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this movie?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <p>
                                </tbody>
                            </table>
                        @else
                        <p>No Movies Yet..</p>
                        @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->isAdmin == 0)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{auth()->user()->name}}'s {{ __('Dashboard') }}
                    {{--<a style="float:right" href="{{route('movie.create')}}" class="btn btn-primary btn-sm">Search Movie</a>--}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>List of Movies</h3>
                    @if(!$movies->isEmpty())
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($movies as $movie)
                                    <tr>
                                        <th scope="row">{{$movie->id}}</th>
                                        <td>{{$movie->movie_name}}</td>
                                        <td>{{str_limit($movie->movie_description, 30)}}</td>
                                        <td><a href="/movie/{{$movie->id}}" class="btn">View</a></td>
                                    </tr>
                                    @endforeach
                                    <p>
                                </tbody>
                            </table>
                        @else
                        <p>No Movies Yet..</p>
                        @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
