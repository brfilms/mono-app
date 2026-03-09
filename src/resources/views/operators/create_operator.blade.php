@extends("templates.layout")
@section("title")
Formulário de Cadastro
@endsection
@section("content")
    <form action="{{route('operators')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome: </label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="document" class="form-label">CPF: </label>
            <input type="number" class="form-control" name="document" id="document">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Data de Nascimento: </label>
            <input type="date" class="form-control" name="birthdate" id="birthdate">
        </div>
        <div class="mb-3">
            <label for="registration" class="form-label">Nº Matrícula: </label>
            <input type="number" class="form-control" name="registration" id="registration">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone: </label>
            <input type="number" class="form-control" name="phone" id="phone">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Endereço: </label>
            <input type="text" class="form-control" name="address" id="address">
        </div>
        <div class="mb-3">
            <label for="sector" class="form-label">Setor: </label>
            <input type="text" class="form-control" name="sector" id="sector">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email: </label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="email_confirm" class="form-label">Confirme seu Email: </label>
            <input type="text" class="form-control" name="email_confirm" id="email_confirm">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha: </label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirme sua senha: </label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="/operators" class="btn btn-info">Voltar</a>
    </form>
@endsection