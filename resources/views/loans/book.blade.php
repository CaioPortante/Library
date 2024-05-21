@extends('layouts.app')

@section('title', 'Alugar Livro')
@section('pageTitle', 'Alugar '. $book->title)

@section('content')
    
    <div class="grid grid-cols-2 grid-flow-col px-36">

        <div class="flex flex-col px-8 gap-4 text-center pt-20">
            <span class="italic font-bold text-2xl w-1/2 mx-auto">{{ $book->title }}</span>
            <span class="italic text-base w-1/2 mx-auto">{{ $book->description }}</span>
            <span class="text-end text-gray-500 w-1/2 mx-auto text-sm">{{ $book->isbn }}</span>
        </div>

        <div class="pt-20">
            <form method="post" action="{{ route('loan.book.save', ['id' => $book->id]) }}">
                @csrf
                <div class="flex flex-col gap-6">
                    <span for="time" class="text-center">Por quantos dias deseja alugar esse livro?</span>
                    <input type="number" name="time" class="border-slate-500 border rounded w-20 h-12 mx-auto text-2xl p-2" min="1" value="7">
                    <button type="submit" class="py-2 px-4 border rounded-lg text-white bg-sky-950 mx-auto">
                        Alugar
                    </button>
                </div>
            </form>
        </div>

        
    </div>
    
    @if (!empty(session('status')))
        Erro: {{ session('status')[1] }}
    @endif

@endsection