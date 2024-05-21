@extends('layouts.app')

@section('title', 'Livros')
@section('pageTitle', 'Lista de Livros')

@section('content')
    
    <div class="grid grid-cols-4 gap-4">
        @foreach ($books as $book)
            <a href="{{ route('loan.book', ["id" => $book->id]) }}" 
                @if ($book->quantity === 0)
                    @disabled(true)
                @endif 
                class="relative block max-w-sm mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-400/10 hover:border-gray-600 disabled:bg-gray-900 transition"
            >
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $book->title }}</h5>
                <p class="font-normal text-gray-700">{{ $book->description }}</p>
                <p class="font-normal text-gray-400 text-sm absolute bottom-2 right-2">{{ $book->isbn }}</p>
            </a>
        @endforeach
    </div>   

@endsection