<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{route('users.create')}}" method="post">
    @csrf
    <label for="name">Nome</label>
    <input type="text" name="name" id="name">
    <button type="submit">Cadastrar</button>
</form>
</body>
</html>
