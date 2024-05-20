@extends('layouts.app')

@section('title', 'Register')
@section('pageTitle', 'Cadastrar novo usuário')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col">

            <div class="flex flex-row">
                <span for="name" class="">Nome:</span>
                <input type="text" name="name" class="border rounded">
            </div>
            <div class="flex flex-row">
                <span for="email" class="">Email:</span>
                <input type="email" name="email" class="border rounded">
            </div>
            <div class="flex flex-row">
                <span for="password" class="">Senha:</span>
                <input type="password" name="password" class="border rounded">
            </div>
            <div class="flex flex-row">
                <span for="type" class="">Nivel de Acesso:</span>
                <select name="type" class="border rounded">
                    @foreach ($userTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->description }}</option>                
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Salvar">

        </div>
    </form>
@endsection