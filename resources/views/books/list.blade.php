@extends('layouts.app')

@section('title', 'Livros')
@section('pageTitle', 'Lista de Livros')

@section('content')

    <div class="flex flex-row justify-between px-8">
        <a href={{ route('dashboard') }}>
            <button type="button" class="mb-4 text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Voltar
            </button>
        </a>

        <div class="pr-8 w-1/4">
            <input name="search" id="search" type="text" placeholder="Buscar um Livro/Autor/ISBN" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        </div>
    </div>
    <div id="response-div" class="mt-8">

    </div>

    @push('scripts')
        <script>
            $('#search').on('keyup', (input) => {
                searchBooks(input.target.value)
            })
        </script>
    @endpush

@endsection