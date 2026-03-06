<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{ route('users') }}" method="post">
    @csrf
    <label for="name">Nome</label>
    <input type="text" name="name" id="name">
<br>

    <label for="name">Telefone</label>
    <input type="text" name="phone" id="phone">
    <br>
    <label for="name">Email</label>
    <input type="text" name="email" id="email">
    <br>
    <label for="name">Senha</label>
    <input type="text" name="password" id="password">
    <br>
    <label for="name">CPF</label>
    <input type="text" name="document" id="document">
    <br>
    <label for="name">Data de Nascimento</label>
    <input type="date" name="birthday" id="birthday">
    <br>
    <button type="submit">Cadastrar</button>
</form>
</body>
</html>
