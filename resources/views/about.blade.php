@extends('master')
@section('title') About Page @stop
@section('content')

    <h1>I'm About</h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias at, blanditiis delectus doloribus eius est, eveniet in iste nesciunt non nulla officia placeat possimus provident quibusdam quis ratione velit?
    </p>

    <a class="btn btn-primary" href="{{ route('contact') }}">To Contact</a>
    <a @class('btn btn-outline-primary') href="{{ route('home') }}">To Home</a>

@endsection
