@extends('pages.InsidePages')
@section('content')
    <div class="content">

    <h1> Your Posts: </h1>
    @foreach((array)$posts As $post)
        <ul>
            <li>{{$post->picture}} </li>
            <li>{{$post->description}}</li>
            @auth
                <a href='{{route('edite'. $post->id)}}' class="btn btn-primary">Edit</a>
                <form action="{{route ('Posts.destroy',['id'=>$post->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href='{{route('delete'. $post->id)}}' class="btn btn-primary">Delete</a>
                    @endauth
                </form>
        </ul>
        @endforeach







        </div>
    @endsection
