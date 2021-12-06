@extends('pages.InsidePages')


@section('content')
    <h1> <p>Edite Your Post: </p></h1>
    <div class="flex-center position-ref full-height">
        <form action='{{route('update')}}'method='POST'>
            @csrf
            @method('put')
            <input type='file' name='picture' required>
            <br>
            <br>
            <label for='description'> Description: </label>
            <textarea name='description' cols='20' rows='10' required></textarea>
            <br>
            <br>
            <button type="submit"> Repost</button>
        </form>
    </div>
@endsection
