@extends('layouts.app')

@section('title', 'Admin Books')
@section('pageTitle', 'Editar livro: '.$book->title)

@section('content')
    <form method="post" action="{{ route("admin.books.edit.save", ["id"=>$book->id]) }}" class="flex justify-center">
        @csrf
        <div class="relative w-full max-w-2xl px-6">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-black/75 ">Título</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="author" class="block mb-2 text-sm font-medium text-black/75 ">Autor(a)</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="isbn" class="block mb-2 text-sm font-medium text-black/75 ">ISBN</label>
                <input type="text" maxlength="14" id="isbn" name="isbn" value="{{ $book->isbn }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-black/75 ">Descrição</label>
                <textarea id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ $book->description }}</textarea>
            </div>
            <div class="mb-5">
                <label for="quantity" class="block mb-2 text-sm font-medium text-black/75 ">Estoque Inicial</label>
                <input type="number" min="1" id="quantity" name="quantity" value="{{ $book->quantity }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="flex flex-row gap-4">
                <a href="{{ route("admin.books") }}">
                    <button type="button" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                        Voltar
                    </button>
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                    Salvar
                </button>
            </div>
        </div>
    </form>
@endsection