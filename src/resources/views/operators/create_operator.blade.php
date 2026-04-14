<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRFILMS - {{ isset($customer) ? 'Editar' : 'Cadastrar' }} Espectador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/form-style.css')}}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container py-2">
        <a class="navbar-brand fw-bold fs-3 text-primary" href="{{ url('/') }}">BR<span class="text-white">FILMS</span></a>
        <div class="ms-auto">
            <a href="{{ route('customers.index') }}" class="btn btn-outline-light btn-sm px-4 fw-bold border-secondary">
                <i class="bi bi-arrow-left me-2"></i>VOLTAR À LISTA
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7"> 
            <div class="card card-custom">
                <div class="card-body p-4 p-md-5">
                    
                    <div class="text-center mb-5">
                        <div class="icon-badge">
                            <i class="bi {{ isset($operator) ? 'bi-pencil-square' : 'bi-person-plus' }} text-white fs-3"></i>
                        </div>
                        <h2 class="fw-bold text-white">{{ isset($operator) ? 'Editar Cadastro' : 'Novo Espectador' }}</h2>
                        <p class="text-secondary small">{{ isset($operator) ? 'Mantenha os dados do elenco atualizados.' : 'Preencha os campos para registrar um novo membro.' }}</p>
                    </div>

                    <form action="{{ isset($operator) ? route('customers.update', $customer->id) : route('customers.store') }}" method="post">
                        @csrf
                        @if(isset($customer)) @method('PUT') @endif
                        
                        <div class="mb-4">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $customer->name ?? '') }}" placeholder="Ex: Diego Dutra">
                            @error('name') 
                                <div class="invalid-feedback">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="tel" name="phone" id="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone', $customer->phone ?? '') }}" placeholder="(00) 00000-0000" maxlength="15">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="document" class="form-label">CPF</label>
                                <input type="text" name="document" id="document" 
                                       class="form-control @error('document') is-invalid @enderror" 
                                       value="{{ old('document', $customer->document ?? '') }}" placeholder="000.000.000-00" maxlength="14">
                                @error('document') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $customer->email ?? '') }}" placeholder="exemplo@brfilms.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        @if(!isset($customer))
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror" placeholder="******">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="form-control" placeholder="******">
                            </div>
                        </div>
                        @endif
                        
                        <div class="mb-5">
                            <label for="birthday" class="form-label">Data de Nascimento</label>
                            <input type="date" name="birthday" id="birthday" 
                                   class="form-control @error('birthday') is-invalid @enderror" 
                                   value="{{ old('birthday', isset($customer) ? \Carbon\Carbon::parse($customer->birthday)->format('Y-m-d') : '') }}">
                            @error('birthday') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                {{ isset($customer) ? 'ATUALIZAR DADOS' : 'FINALIZAR REGISTRO' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center p-5">
        <div class="mb-4">
            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
        </div>
        <h3 class="text-white fw-bold">Perfeito!</h3>
        <p class="text-secondary">{{ session('success') }}</p>
        <div class="d-grid gap-2 mt-4">
            <a href="{{ route('customers.index') }}" class="btn btn-primary fw-bold">Ir para a Listagem</a>
            <button type="button" class="btn btn-link text-secondary text-decoration-none btn-sm" data-bs-dismiss="modal">Cadastrar outro</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Ativa o modal de sucesso se houver a mensagem na sessão
    @if(session('success'))
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    @endif

    // Máscaras de Input
    const phoneInput = document.getElementById('phone');
    const documentInput = document.getElementById('document');

    phoneInput.addEventListener('input', e => {
        let v = e.target.value.replace(/\D/g, '');
        v = v.replace(/^(\d{2})(\d)/g, '($1) $2').replace(/(\d)(\d{4})$/, '$1-$2');
        e.target.value = v;
    });

    documentInput.addEventListener('input', e => {
        let v = e.target.value.replace(/\D/g, '');
        v = v.replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = v;
    });
</script>
</body>
</html>