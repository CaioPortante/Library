<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteca Online</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
    </head>
    <body class="font-sans antialiased  bg-gray-900">
        <div class="bg-gray-50 text-white/75 bg-gray-900">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <div class="w-full flex justify-center mb-5">
                        <span class="text-2xl">Realize o Cadastro</span>
                    </div>
                    <form class="max-w-md mx-auto" method="POST" action="{{ route("register") }}">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-white/75 ">Nome</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-white/75 ">Email</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-white/75 ">Senha</label>
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5">
                            <label for="type" class="block mb-2 text-sm font-medium text-white/75 ">Tipo de Acesso</label>
                            <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($userTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Criar Usuário</button>
                    </form>
                    
                    <div class="max-w-md mx-auto mt-2 flex flex-row justify-between px-8">
                        <span class="">Já tem acesso?</span>
                        <a href="{{ route("login.screen") }}" class="underline text-blue-400">Ir para o Login</a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
