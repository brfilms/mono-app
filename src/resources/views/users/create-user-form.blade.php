<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Cadastro de Usuário</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('users') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome completo" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="(00) 00000-0000" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="seu@email.com" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Crie uma senha forte" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="document" class="form-label">CPF</label>
                            <input type="text" name="document" id="document" class="form-control" placeholder="000.000.000-00" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="birthday" class="form-label">Data de Nascimento</label>
                            <input type="date" name="birthday" id="birthday" class="form-control" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>