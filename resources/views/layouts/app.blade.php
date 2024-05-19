<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library')</title>

    <link href="./public/css/app.css" rel="stylesheet">

</head>
<body>

    @include('partials.header')

    <h1>@yield('pageTitle', 'Biblioteca Online')</h1>
    
    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="./resources/js/app.js"></script>

</body>
</html>