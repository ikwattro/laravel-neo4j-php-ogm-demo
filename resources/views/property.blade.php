@extends('welcome')

@section('title', $property->getTitle())

@section('content')
    <div class="property-info">
        <h2>{{ $property->getTitle() }}</h2>
        <p>{{ $property->getDescription() }}</p>
        <p><img src="{{ $property->getImage() }}"/> </p>
    </div>
@endsection