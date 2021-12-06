@extends('pages.InsidePages')
@section('content')

    <h1> The Blog: </h1>
    @foreach((array)$post As $post)
        <ul>
            <li>  {{$post-> picture}} </li>
            <li>  {{$post -> description}}</li>

        </ul>
@endforeach
@endsection
