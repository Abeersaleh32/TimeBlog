<!-- instead of copying a lot of repeated lines, this section for shorting the code -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name' , 'Blog')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #F3FDFD;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: left;
            padding: 30px;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .link > a {
            color: #636b6f;
            width: 100%;
            background: #fff;
            display: inline-block;
            border-style: groove;
            padding: 0 20px;
            font-size: 17px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        p{color: #636b6f;}


    </style>
</head>
<body>
<div class="content">

    <div class="link">
        @auth
            <a href="{{route('add')}}">Add Post</a>
            <a href="{{route('profile')}}">Profile</a>
            <a href="{{route('blogs')}}">Blog</a>
        @endauth
    </div>

</div>

@yield('content')


</body>
</html>
