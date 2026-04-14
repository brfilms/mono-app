<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRFILMS - Elenco de Espectadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-2">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 text-primary" href="{{ url('/') }}">BR<span class="text-white">FILMS</span></a>
        <div class="ms-auto">
            <a href="{{ url('/users/create') }}" class="btn btn-primary btn-sm px-4 py-2 fw-bold shadow-sm" style="border-radius: 10px;">
                {{-- <i class="bi bi-plus-lg me-1"></i>--}}📜 CADASTRAR NOVO 
            </a>
        </div>
    </div>
</nav>

<div class="container mt-3 mb-5"> <div class="row mb-4 align-items-end"> <div class="col-lg-6 mb-3 mb-lg-0">
            <h1 class="fw-bold mb-1 fs-3 text-white">Elenco de Espectadores</h1>
            <p class="text-secondary small mb-0">Gerencie a base de dados da BRFILMS.</p>
        </div>
        
        
    </div>

    @if(session('success'))
        <div class="alert alert-success bg-dark border border-success text-success py-2 mb-4 rounded-4 shadow-sm d-flex align-items-center small">
            <i class="bi bi-check-circle-fill me-2"></i> 
            <span class="fw-semibold">{{ session('success') }}</span>
        </div>
    @endif

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-3"> @foreach($operatorList as $operator)
                <div class="col">
                    <div class="card h-100 card-viewer">
                        <div class="card-actions">
                            <a href="" class="btn-action-card" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn-action-card btn-delete" 
                                    data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                    data-id="{{ $operator->id }}" data-name="{{ $operator->name }}" title="Excluir">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        
                        <div class="card-header-profile">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($operator->name, 0, 1)) }}
                            </div>
                            <h6 class="fw-bold text-white text-truncate mb-1">{{ $operator->name }}</h6>
                            <span class="text-primary fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                                {{ strtolower($operator->email) }}
                            </span>
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">CPF</span>
                                <span class="info-value">{{ $operator->document }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Telefone</span>
                                <span class="info-value">{{ $operator->phone }}</span>
                            </div>
                            <div class="info-item info-full-width d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="info-label">Nascimento</span>
                                    <span class="info-value text-white">
                                        {{ \Carbon\Carbon::parse($operator->birthday)->format('d/m/Y') }}
                                    </span>
                                </div>
                                <i class="bi bi-calendar-event text-secondary opacity-25 fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content shadow-lg">
            <div class="modal-body text-center p-4">
                <i class="bi bi-exclamation-triangle-fill text-danger fs-1 mb-3"></i>
                <h5 class="text-white fw-bold mb-2">Excluir?</h5>
                <p class="text-secondary small mb-4"><strong id="delName" class="text-white"></strong></p>
                <form id="delForm" method="POST">
                    @csrf @method('DELETE')
                    <div class="d-flex flex-column gap-2">
                        <button type="submit" class="btn btn-danger fw-bold rounded-3">Sim, excluir</button>
                        <button type="button" class="btn btn-dark text-secondary rounded-3 border-0" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>