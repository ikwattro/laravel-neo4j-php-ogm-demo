@extends('welcome')

@section('title', 'All actors');

@section('content')
    @each('actor-partial', $actors, 'actor')
@endsection