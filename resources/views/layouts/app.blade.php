<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Library')</title>
    <link rel="icon" href="{{ asset('img/icon_books.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col relative">
        
        @include('partials.header')
        
        <div class="w-100 flex-grow">
            @yield('content')
        </div>

        @include('partials.error')
    
        @include('partials.footer')

        
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @if (!empty(session('response')))
    
        <script src="{{ asset('js/error.js') }}"></script>

    @endif
    
    @stack('scripts')

</body>
</html>