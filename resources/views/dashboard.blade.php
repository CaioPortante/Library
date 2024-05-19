<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    
    <link href="./public/css/app.css" rel="stylesheet">

</head>
<body>
    <h1>Bem-vindo ao Dashboard</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>