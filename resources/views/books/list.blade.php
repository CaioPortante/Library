@extends('layouts.app')

@section('title', 'Livros')
@section('pageTitle', 'Lista de Livros')

@section('content')

    <a href={{ route('dashboard') }}>
        <button type="button" class="ml-8 mb-4 text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Voltar
        </button>
    </a>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($books as $book)
            @if ($book->quantity <= 0)
                <a class="relative block max-w-sm mx-auto p-6 bg-gray-200 border border-gray-400 rounded-lg shadow">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700/75">{{ $book->title }}</h5>
                    <p class="font-normal text-gray-500/75 mb-2">{{ $book->description }}</p>
                    <p class="font-normal text-gray-400/75 text-sm absolute bottom-2 right-2">{{ $book->isbn }}</p>
                    <p class="font-normal text-red-400 text-sm absolute bottom-2 left-8">Indisponível</p>
                </a>
            @else
                <a href="{{ route('loan.book', ["id" => $book->id]) }}" 
                    class="relative block max-w-sm mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-400/10 hover:border-gray-600 transition"
                    >
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $book->title }}</h5>
                    <p class="font-normal text-gray-700">{{ $book->description }}</p>
                    <p class="font-normal text-gray-400 text-sm absolute bottom-2 right-2">{{ $book->isbn }}</p>
                    <p class="font-normal text-gray-400 text-sm absolute bottom-2 left-8">{{ $book->quantity }} Disponíveis</p>
                </a>
            @endif 
        @endforeach
    </div>   

@endsection