@extends('welcome')

@section('title', 'Properties List')

@section('content')
    @foreach($properties as $property)
        <h3><a href="/property/{{ $property->getId() }}">{{ $property->getTitle() }}</a></h3> - {{ $property->getCountry()->getName() }}
        <img src="{{ $property->getImage() }}"/>
    @endforeach
@endsection