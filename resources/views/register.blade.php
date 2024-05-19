@extends('layouts.app')

@section('title', 'Register')
@section('pageTitle', 'Cadastrar novo usuário')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="password" name="password">
        <select name="type">
            @foreach ($userTypes as $type)
                <option value="{{ $type->id }}">{{ $type->description }}</option>                
            @endforeach
        </select>
        <input type="submit" value="Salvar">
    </form>
@endsection