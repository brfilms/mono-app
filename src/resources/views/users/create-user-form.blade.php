<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
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
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   placeholder="Digite o nome completo">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="tel" name="phone" id="phone" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone') }}"
                                   placeholder="(00) 00000-0000" maxlength="15">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}"
                                   placeholder="seu@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="Crie uma senha">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="form-control" 
                                       placeholder="Repita a senha">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="document" class="form-label">CPF</label>
                            <input type="text" name="document" id="document" 
                                   class="form-control @error('document') is-invalid @enderror" 
                                   value="{{ old('document') }}"
                                   placeholder="000.000.000-00" maxlength="14">
                            @error('document')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="birthday" class="form-label">Data de Nascimento</label>
                            <input type="date" name="birthday" id="birthday" 
                                   class="form-control @error('birthday') is-invalid @enderror" 
                                   value="{{ old('birthday') }}">
                            @error('birthday')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Sucesso!</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center p-4">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
        <p class="mt-3 fs-5">{{ session('success') }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    @if(session('success'))
        const myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();
    @endif

    const phoneInput = document.getElementById('phone');
    const documentInput = document.getElementById('document');

    phoneInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        let formatted = value.replace(/^(\d{2})(\d)/g, '($1) $2');
        formatted = formatted.replace(/(\d)(\d{4})$/, '$1-$2');
        e.target.value = formatted;
    });

    documentInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        let formatted = value.replace(/(\d{3})(\d)/, '$1.$2');
        formatted = formatted.replace(/(\d{3})(\d)/, '$1.$2');
        formatted = formatted.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = formatted;
    });
</script>
</body>
</html>