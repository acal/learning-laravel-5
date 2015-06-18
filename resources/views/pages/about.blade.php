@extends('app')

@section('content')

<h1>About</h1>

<h3>People I like</h3>
@if (count($people))
    <ul>
        @foreach ($people as $person)
        <li>{{ $person }}</li>
        @endforeach
    </ul>
@endif
    <h1>About Me: {{ $first }} {{ $last }}</h1> <!-- escaped -->
    <p>Sup?</p>

@stop