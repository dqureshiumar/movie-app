@extends('layouts.app')
@if(auth()->user()->isAdmin == 1)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>Add Movie</h2>
                <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="movie_name">Title</label>
                        <input type="text" name="movie_name" class="form-control" id="movie_name" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="movie_description" id="description" rows="3"></textarea>
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
            <hr>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>Or Enter IMDB Id</h2>
                <form action="{{route('imdb')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="imdb_id">IMDB ID</label>
                        <input type="text" name="imdb_id" class="form-control" id="imdb_id" placeholder="Enter Only the Digits, dont inculde tt, Eg:6473300" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Search Movie">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@endif