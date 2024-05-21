<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteca Online</title>

        <link rel="icon" href="{{ asset('img/icon_books.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
    </head>
    <body class="font-sans antialiased  bg-gray-900">
        <div class="bg-gray-50 text-white/75 bg-gray-900">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <div class="w-full flex justify-center mb-5">
                        <span class="text-2xl">Realize o Login na Plataforma</span>
                    </div>
                    <form class="max-w-md mx-auto" method="POST" action="{{ route("login") }}">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-white/75 ">Email</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-white/75 ">Senha</label>
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Acessar</button>
                    </form>
                    
                    <div class="max-w-md mx-auto mt-2 flex flex-row justify-between px-8">
                        <span class="">Não tem acesso?</span>
                        <a href="{{ route("register") }}" class="underline text-blue-400">Criar Usuário</a>
                    </div>
                    
                </div>
                @if (!empty(session('response')))
                    @if (session('response')[0] === 200)
                        <div class="absolute bottom-32 right-5 bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4" role="alert" id="error" hidden>
                            <p class="text-lg">
                                {{ session('response')[1] }}
                            </p>
                        </div>
                    @else
                        <div class="absolute bottom-32 right-16 bg-red-100 border-l-4 border-red-500 text-red-700 px-6 py-4" role="alert" id="error" hidden>
                            <p class="text-lg">
                                {{ session('response')[1] }}
                            </p>
                        </div>
                    @endif
                @endif
            </div>
        </div>

    </body>

    @if (!empty(session('response')))
    
        <script src="{{ asset('js/error.js') }}"></script>

    @endif
    
</html>
