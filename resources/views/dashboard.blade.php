@extends('layouts.app')

@section('pageTitle', 'Bem-vindo(a)')

@section('content')

    <div class="flex flex-col justify-around w-100">
        
        <div class="flex justify-between w-100 mx-4 mb-4">
            <div>
                @if (session('user_type') === 1)
                    <a href="{{ route("admin.books") }}">
                        <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 mx-auto">
                            Gerenciar Livros
                        </button>
                    </a>
                @endif
            </div>
            <a href="{{ route("books.list") }}" class="w-100">
                <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 mx-auto">
                    Fazer um Aluguel
                </button>
            </a>
        </div>

        <div class="w-100 mt-8">
            @if(count($loans) === 0)
                <div class="w-100 text-center italic">
                    Nenhum livro alugado... Ainda!
                </div>
            @else
                <div class="grid grid-cols-4">
                    @foreach ($loans as $loan)
                        <div class="relative block max-w-sm mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow transition mb-6">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $loan->book->title }}</h5>
                            <p class="font-normal text-gray-700">{{ $loan->book->description }}</p>
                            <p class="font-normal text-gray-700 font-semibold my-2">Pego em: {{ date('d/m/Y', strtotime($loan->got_at)) }} por {{  $loan->days  }} Dias</p>
                            <p class="font-normal text-gray-400 text-sm absolute bottom-2 right-2">{{ $loan->book->isbn }}</p>
                            <form method="post" class="absolute -top-3 right-2" action="{{ route('loan.book.return', ['id' => $loan->id]) }}">
                                @csrf
                                <button type="submit" class="p-1 px-2 rounded-md rounded-top bg-red-400 italic font-bold">
                                    Devolver
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        
    </div>
    
@endsection