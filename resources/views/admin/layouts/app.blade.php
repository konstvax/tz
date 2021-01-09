<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--        <link rel="stylesheet" href="css/bootstrap.css">--}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <title>{{$title ?? ''}}</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{asset('js/bootstrap.js')}}"></script>
    </body>
</html>
