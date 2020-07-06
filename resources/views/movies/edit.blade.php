@extends('layouts.app')
@if(auth()->user()->isAdmin == 1)
@section('content')
    <div class="container">
        <h2>Edit Movie</h2>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <form action="{{ route('movie.update', [$movie->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="movie_name">Title</label>
                        <input type="text" name="movie_name" class="form-control" id="movie_name" value="{{$movie->movie_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="movie_description" id="description" rows="3" placeholder="{{ __('Movie Description') }}" value="{{$movie->movie_description}}"></textarea>
                    </div>
                    <div class="custom-file form-group">
                        <label class="custom-file-label" for="movie_poster">Upload Poster...</label>
                        <input type="file" class="custom-file-input" name="movie_poster" id="movie_poster" required>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@endif