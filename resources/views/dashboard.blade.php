@extends('layouts.app')

@section('pageTitle', 'Bem-vindo(a)')

@section('content')

    <div class="grid grid-cols-2 justify-around w-100">
        <a href="" class="w-100 flex">
            <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 w-1/2 mx-auto">
                Minhas Reservas
            </button>
        </a>

        <a href="" class="w-100 flex">
            <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 w-1/2 mx-auto">
                Ver Livros
            </button>
        </a>
        
    </div>
    
@endsection