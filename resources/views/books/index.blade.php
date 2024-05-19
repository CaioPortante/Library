@extends('layouts.app')

@section('title', 'Admin Books')
@section('pageTitle', 'Controle de Livros')

@section('content')
    <table class="border border-black">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Descrição</th>
                <th>ISBN</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <a href="{{ route("admin.books.edit", ["id"=>$book->id]) }}">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection