<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRFILMS - Elenco de Espectadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #141414;
            --input-bg: #1f1f1f;
            --primary: #0d6efd;
            --border: #333;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: #ffffff;
            background-image: radial-gradient(circle at 0% 0%, #1a1a1a 0%, #0a0a0a 50%);
            min-height: 100vh;
        }

        .navbar {
            background-color: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--border);
        }

        /* BARRA DE BUSCA PREMIUM */
        .search-container {
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 4px 15px; /* Reduzido levemente */
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.2);
        }

        .search-container:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.15);
            background: #252525;
        }

        .search-input {
            background: transparent;
            border: none;
            color: white;
            padding: 8px; /* Reduzido de 10px */
            width: 100%;
        }

        .search-input:focus { outline: none; }
        .search-input::placeholder { color: #666; font-weight: 500; }

        .btn-search {
            border-radius: 8px;
            padding: 6px 16px; /* Mais compacto */
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* CARDS MODERNOS */
        .card-viewer {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .card-viewer:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 15px 30px rgba(13, 110, 253, 0.15);
        }

        .card-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 6px;
            z-index: 10;
        }

        .btn-action-card {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            transition: all 0.2s;
        }

        .btn-action-card:hover { 
            background: var(--primary); 
            color: white; 
            border-color: var(--primary);
        }
        
        .btn-delete:hover { background: #dc3545 !important; border-color: #dc3545 !important; }

        .card-header-profile {
            padding: 1.2rem 1rem; /* Mais compacto */
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            background: linear-gradient(to bottom, rgba(255,255,255,0.02), transparent);
        }

        .avatar-circle {
            width: 50px; /* Reduzido de 55px */
            height: 50px;
            background: linear-gradient(135deg, var(--primary), #004085);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .info-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 0.8rem; 
            padding: 1rem; 
        }

        .info-label { 
            font-size: 0.6rem; 
            color: #777; 
            text-transform: uppercase; 
            font-weight: 700; 
            margin-bottom: 2px; 
            display: block;
        }

        .info-value { 
            font-size: 0.8rem; 
            color: #e0e0e0; 
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
            font-weight: 500;
            display: block;
        }

        .info-full-width { 
            grid-column: span 2; 
            border-top: 1px solid rgba(255, 255, 255, 0.05); 
            padding-top: 0.8rem; 
        }

        .modal-content {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
        }
    </style>
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
        
        <div class="col-lg-6">
            <form action="{{ route('customers.index') }}" method="GET">
                <div class="search-container d-flex align-items-center">
                    <i class="bi bi-search text-secondary ms-2 me-1"></i>
                    <input type="text" name="search" class="search-input" 
                           placeholder="Buscar por nome ou CPF..." 
                           value="{{ request('search') }}">
                    @if(request('search'))
                        <a href="{{ route('customers.index') }}" class="text-secondary me-3 text-decoration-none">
                            <i class="bi bi-x-circle-fill fs-5"></i>
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary btn-search shadow-sm">BUSCAR</button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success bg-dark border border-success text-success py-2 mb-4 rounded-4 shadow-sm d-flex align-items-center small">
            <i class="bi bi-check-circle-fill me-2"></i> 
            <span class="fw-semibold">{{ session('success') }}</span>
        </div>
    @endif

    @if($customers->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-search text-secondary opacity-25" style="font-size: 3rem;"></i>
            <h4 class="text-white fw-bold mt-3">Nenhum espectador encontrado</h4>
            @if(request('search'))
                <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary btn-sm mt-2 rounded-pill">Limpar Filtros</a>
            @endif
        </div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-3"> @foreach($customers as $customer)
                <div class="col">
                    <div class="card h-100 card-viewer">
                        <div class="card-actions">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn-action-card" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn-action-card btn-delete" 
                                    data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                    data-id="{{ $customer->id }}" data-name="{{ $customer->name }}" title="Excluir">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        
                        <div class="card-header-profile">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($customer->name, 0, 1)) }}
                            </div>
                            <h6 class="fw-bold text-white text-truncate mb-1">{{ $customer->name }}</h6>
                            <span class="text-primary fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                                {{ strtolower($customer->email) }}
                            </span>
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">CPF</span>
                                <span class="info-value">{{ $customer->document }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Telefone</span>
                                <span class="info-value">{{ $customer->phone }}</span>
                            </div>
                            <div class="info-item info-full-width d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="info-label">Nascimento</span>
                                    <span class="info-value text-white">
                                        {{ \Carbon\Carbon::parse($customer->birthday)->format('d/m/Y') }}
                                    </span>
                                </div>
                                <i class="bi bi-calendar-event text-secondary opacity-25 fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
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
<script>
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;

        const customerId = btn.getAttribute('data-id');
        const customerName = btn.getAttribute('data-name');

        document.getElementById('delName').textContent = customerName;

        document.getElementById('delForm').action =
            "{{ url('/clientes') }}/" + customerId;
    });
</script>
</body>
</html>