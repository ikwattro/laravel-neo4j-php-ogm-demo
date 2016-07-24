@extends('welcome')

@section('content')
    {{ Form::model($actor, array('route' => array('actor.update', $actor->getId()))) }}

    {{ Form::text('name', $actor->getName()) }}

    {{ Form::number('born', $actor->getBorn()) }}

    {{ Form::submit('Submit') }}

    {{ Form::close()}}
@endsection