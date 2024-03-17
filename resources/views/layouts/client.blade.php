<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src=" https://kit.fontawesome.com/e1aaf64c7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}">
    @yield('css');
</head>

<body>
    @include('blocks.header')

    @include('blocks.footer')
    @section('sidebar')
        <p>Main sidebar</p>
    @endsection
</body>

</html>
