<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('operators')}}" method="post">
        @csrf
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="document">CPF: </label>
        <input type="number" name="document" id="document">
        <br>
        <label for="birthdate">Data de Nascimento: </label>
        <input type="date" name="birthdate" id="birthdate">
        <br>
        <label for="registration">Nº Matrícula: </label>
        <input type="number" name="registration" id="registration">
        <br>
        <label for="phone">Telefone: </label>
        <input type="number" name="phone" id="phone">
        <br>
        <label for="address">Endereço: </label>
        <input type="text" name="address" id="address">
        <br>
        <label for="sector">Setor: </label>
        <input type="text" name="sector" id="sector">
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <br>
        <label for="email_confirm">Confirme seu Email: </label>
        <input type="text" name="email_confirm" id="email_confirm">
        <br>
        <label for="password">Senha: </label>
        <input type="password" name="password" id="password">
        <br>
        <label for="password_confirm">Confirme sua senha: </label>
        <input type="password" name="password_confirm" id="password_confirm">
        <br>
        <button type="submit">Cadastrar</button>
        <a href="/operators">Voltar</a>
    </form>
</body>
</html>