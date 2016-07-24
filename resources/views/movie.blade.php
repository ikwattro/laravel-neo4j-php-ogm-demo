@extends('welcome')

@section('title', $movie->getTitle());

@section('content')
    <div class="movie-info">
        <h2>{{ $movie->getTitle() }}</h2>
        <p>Number of actors : <em>{{ count($movie->getActors()) }}</em></p>
        <div class="actors">
            <h5>Actors</h5>
            @foreach($movie->getActors() as $actor)
                <p>{{ $actor->getActor()->getName() }} (<a href="/actor/{{ $actor->getActor()->getId() }}">info</a>)</p>
            @endforeach
        </div>
    </div>
@endsection