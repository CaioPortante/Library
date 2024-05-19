<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="./public/css/app.css" rel="stylesheet">

</head>
<body>
    <h1>Criar Usuário</h1>
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
</body>
</html>