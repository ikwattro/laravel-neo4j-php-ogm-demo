@extends('welcome')

@section('title', $actor->getName())

@section('content')
    <div class="actor-info">
        <h4>{{ $actor->getName() }}</h4>
        <p>Year of birth : {{ $actor->getBorn() }}</p>
        <br />
        <h3>Filmography</h3>
        <ul class="list-unstyled">
            @foreach($actor->getActs() as $role)
                <li>{{ $role->getMovie()->getTitle() }} as "{{ implode(', ', $role->getRoles()) }}"</li>
            @endforeach
        </ul>
    </div>
@endsection