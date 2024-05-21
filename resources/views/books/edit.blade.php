@extends('layouts.app')

@section('title', 'Admin Books')
@section('pageTitle', 'Editar livro: '.$book->title)

@section('content')
    <form method="post" action="{{ route("admin.books.edit.save", ["id"=>$book->id]) }}">
        @csrf
        <div class="flex flex-col gap-4">
            <input name="title" type="text" value="{{ $book->title }}">
            <input name="author" type="text" value="{{ $book->author }}">
            <input name="isbn" type="text" value="{{ $book->isbn }}">
            <input name="description" type="textarea" value="{{ $book->description }}">
            <input name="quantity" type="number" value="{{ $book->quantity }}">

            <div>
                <a href="{{ route("admin.books") }}">Voltar</a>
                <input type="submit" value="Salvar">
            </div>
        </div>

    </form>

    
    @if(session("response"))
        {{ session("response")[1] }}
    @endif
@endsection