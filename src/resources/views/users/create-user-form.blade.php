<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRFILMS - Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f0f0f; /* Fundo da página continua dark */
            color: #ffffff;
            background-image: radial-gradient(circle at top right, #1a1a1a, #0f0f0f);
            min-height: 100vh;
        }

        .navbar {
            position: relative;
            z-index: 1050;
            background-color: rgba(15, 15, 15, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #333;
        }

        /* AJUSTE: Card com fundo cinza escuro mais claro para destacar */
        .card-custom {
            background-color: #212529; /* Bootstrap dark gray */
            border: 1px solid #444;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5) !important;
        }

        .card-header {
            border-bottom: 1px solid #444 !important;
        }

        /* AJUSTE: Labels com cinza muito claro para leitura fácil */
        .form-label {
            color: #e0e0e0;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* AJUSTE CRÍTICO: Inputs com fundo claro e texto escuro para Máxima Visibilidade */
        .form-control {
            background-color: #f8f9fa; /* Quase branco */
            border: 2px solid #ced4da;
            color: #212529; /* Texto quase preto */
            font-weight: 400;
            border-radius: 8px;
            transition: all 0.2s;
        }

        /* Ajuste do foco para ser mais agressivo */
        .form-control:focus {
            background-color: #ffffff;
            border-color: #0d6efd;
            color: #000000;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.30);
        }

        /* AJUSTE: Placeholder com cor média para não sumir */
        .form-control::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        /* Ajuste específico para o input de data (calendar icon) */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0); /* Garante que o ícone fique escuro no fundo claro */
        }

        /* Ajuste para erros: feedback visual claro */
        .is-invalid {
            border-color: #dc3545 !important;
            background-color: #fff8f8 !important; /* Fundo levemente rosado no erro */
        }

        .invalid-feedback {
            color: #ea868f; /* Rosa claro para ler no fundo dark do card */
            font-weight: 500;
        }

        .btn-back {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top pt-3 pb-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 text-primary" href="{{ url('/') }}">BR<span class="text-white">FILMS</span></a>
        <a href="{{ url('/') }}" class="btn-back small">
            <i class="bi bi-arrow-left me-1"></i> Voltar para Home
        </a>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7"> <div class="card card-custom shadow-lg">
                <div class="card-header bg-transparent p-4 text-center">
                    <i class="bi bi-person-plus text-primary mb-2" style="font-size: 2.5rem;"></i>
                    <h2 class="mb-0 fw-bold text-white">Novo Espectador</h2>
                    <p class="text-secondary small mb-0 mt-2">Crie a conta para acesso à plataforma BRFILMS.</p>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('users') }}" method="post">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label small">NOME COMPLETO</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   placeholder="Ex: Diego Dutra">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="phone" class="form-label small">TELEFONE</label>
                                <input type="tel" name="phone" id="phone" 
                                       class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone') }}"
                                       placeholder="(00) 00000-0000" maxlength="15">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="document" class="form-label small">CPF</label>
                                <input type="text" name="document" id="document" 
                                       class="form-control form-control-lg @error('document') is-invalid @enderror" 
                                       value="{{ old('document') }}"
                                       placeholder="000.000.000-00" maxlength="14">
                                @error('document')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label small">E-MAIL PRINCIPAL</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}"
                                   placeholder="seu.email@exemplo.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="password" class="form-label small">SENHA (mín. 6 caracteres)</label>
                                <input type="password" name="password" id="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       placeholder="******">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label small">CONFIRMAR SENHA</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="form-control form-control-lg" 
                                       placeholder="******">
                            </div>
                        </div>
                        
                        <div class="mb-5">
                            <label for="birthday" class="form-label small">DATA DE NASCIMENTO</label>
                            <input type="date" name="birthday" id="birthday" 
                                   class="form-control form-control-lg @error('birthday') is-invalid @enderror" 
                                   value="{{ old('birthday') }}">
                            @error('birthday')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold py-3">
                                <i class="bi bi-check-circle me-2"></i>FINALIZAR CADASTRO
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark border-secondary">
      <div class="modal-body text-center p-5">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
        <h3 class="text-white mt-3 fw-bold">Cadastro Realizado!</h3>
        <p class="text-secondary mt-2">{{ session('success') }}</p>
        <div class="d-grid mt-4">
            <button type="button" class="btn btn-primary btn-lg" data-bs-dismiss="modal">Acessar Plataforma</button>
        </div>
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