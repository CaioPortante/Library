@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('pageTitle', 'Bem-vindo ao Admin')

@section('content')
    <div>
        <a href="{{ route("admin.books") }}">Gerenciar Livros</a>
    </div>
@endsection