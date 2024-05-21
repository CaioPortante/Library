@extends('layouts.app')

@section('pageTitle', 'Bem-vindo(a)')

@section('content')

    <div class="flex flex-col justify-around w-100">
        <div class="flex ml-auto mr-4 mb-4">
            <a href="{{ route("books.list") }}" class="w-100">
                <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 mx-auto">
                    Fazer uma Reserva
                </button>
            </a>
        </div>

        <div class="w-100">
            @if(count($loans) === 0)
                <div class="w-100 text-center italic">
                    Nenhum livro alugado... Ainda!
                </div>
            @else
                @foreach ($loans as $loan)
                    teste
                @endforeach
            @endif
        </div>
        
    </div>
    
@endsection