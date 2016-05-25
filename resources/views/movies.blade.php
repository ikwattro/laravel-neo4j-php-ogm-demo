@extends('welcome')

@section('title', 'Page Title')

@section('content')
    <div class="title">Movies</div>
    <div class="movies-list">
        @foreach ($movies as $movie)
            <p>Title : <a href="/movie/{{$movie->getId()}}">{{ $movie->getTitle() }}</a> - Actors count : {{ count($movie->getActors()) }}</p>
        @endforeach
    </div>
@endsection