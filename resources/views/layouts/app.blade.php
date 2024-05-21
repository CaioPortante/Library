<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        
        @include('partials.header')
        
        <div class="w-100 flex-grow">
            @yield('content')
        </div>
    
        @include('partials.footer')

    </div>

    <script src="./resources/js/app.js"></script>

</body>
</html>