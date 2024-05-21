@extends('layouts.app')

@section('title', 'Admin Books')
@section('pageTitle', 'Controle de Livros')

@section('content')
    <div class="flex w-100 justify-center">
        <div class="relative overflow-x-auto">
            <div class="w-100 flex justify-end px-4 mb-4">
                <a href="{{ route('admin.books.add') }}">
                    <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 mx-auto">
                        Adicionar novo Livro
                    </button>
                </a>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Autor(a)
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Descrição
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            ISBN
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Quantidade
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $book->title }}
                            </th>
                            <td class="px-6 py-4 italic">
                                {{ $book->author }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $book->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->isbn }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $book->quantity }}
                            </td>
                            <td class="px-6 py-4 text-center gap-2 flex flex-row">
                                <a href="{{ route("admin.books.edit", ["id"=>$book->id]) }}">
                                    <button class="py-2 px-4 border rounded-lg text-white bg-sky-950 mx-auto">
                                        Editar
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('admin.books.delete', ['id'=>$book->id]) }}">
                                    @csrf
                                    <button class="py-2 px-4 border rounded-lg text-white bg-red-600 mx-auto">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection