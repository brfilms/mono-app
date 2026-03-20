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
            --bg-dark: #0f0f0f;
            --card-bg: #1a1d20;
            --primary-color: #0d6efd;
            --border-color: #333639;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: #ffffff;
            background-image: radial-gradient(circle at 50% 0%, #1a1a1a, #0f0f0f);
            min-height: 100vh;
        }

        .navbar {
            background-color: rgba(15, 15, 15, 0.98);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
        }

        .card-viewer {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .card-viewer:hover {
            transform: translateY(-5px);
            border-color: var(--primary-color);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        .card-header-profile {
            background: linear-gradient(to bottom, rgba(13, 110, 253, 0.05), transparent);
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .avatar-circle {
            width: 45px;
            height: 45px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-size: 1.1rem;
            font-weight: 700;
            box-shadow: 0 2px 10px rgba(13, 110, 253, 0.3);
        }

        .card-header-profile h5 {
            font-size: 1rem;
            margin-bottom: 2px;
        }

        .card-header-profile .small {
            font-size: 0.75rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            padding: 1rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.6rem;
            color: #888;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.8px;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 0.8rem;
            color: #efefef;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .info-full-width {
            grid-column: span 2;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 0.75rem;
            margin-top: 0.25rem;
        }

        .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.55rem;
            background: rgba(25, 135, 84, 0.15);
            color: #198754;
            padding: 3px 8px;
            border-radius: 20px;
            border: 1px solid rgba(25, 135, 84, 0.25);
        }

        .empty-state {
            padding: 100px 0;
            text-align: center;
        }
        
        .btn-add-main {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s;
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
        <div class="ms-auto">
            <a href="{{ url('/users/create') }}" class="btn btn-primary btn-sm px-4 fw-bold">
                <i class="bi bi-plus-lg me-1"></i> CADASTRAR
            </a>
            <a href="{{ url('/') }}" class="btn-back small">
                <i class="bi bi-arrow-left me-1"></i> Voltar
            </a>
        </div>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row mb-4 align-items-center"> <div class="col-md-8">
            <h1 class="fw-bold mb-1 fs-2">Elenco de Espectadores</h1> <p class="text-secondary small">Base de dados centralizada da plataforma BRFILMS.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="text-secondary small fw-bold" style="font-size: 0.7rem;"> TOTAL DE REGISTROS: <span class="text-primary fs-6">{{ $customers->count() }}</span> </div>
        </div>
    </div>

    @if($customers->isEmpty())
        <div class="empty-state">
            <i class="bi bi-person-exclamation text-secondary" style="font-size: 4rem; opacity: 0.3;"></i> <h3 class="mt-4 text-secondary fs-4">Nenhum espectador na base</h3> <p class="text-muted small">Clique em "Cadastrar" para adicionar o primeiro.</p>
            <a href="{{ url('/cadastro') }}" class="btn btn-outline-primary mt-3 btn-add-main btn-sm"> Começar agora
            </a>
        </div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 g-3"> @foreach($customers as $customer)
                <div class="col">
                    <div class="card h-100 card-viewer">
                        <span class="status-badge">ATIVO</span>
                        
                        <div class="card-header-profile">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($customer->name, 0, 1)) }}{{ strtoupper(substr(strrchr($customer->name, " "), 1, 1)) ?: '' }}
                            </div>
                            <h5 class="fw-bold text-white text-truncate">{{ $customer->name }}</h5> <div class="text-secondary text-truncate">{{ $customer->email }}</div> </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">CPF</span>
                                <span class="info-value">{{ $customer->document }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Telefone</span>
                                <span class="info-value">{{ $customer->phone }}</span>
                            </div>
                            
                            <div class="info-item info-full-width">
                                <span class="info-label">Data de Nascimento</span>
                                <span class="info-value">
                                    <i class="bi bi-calendar-event me-2 text-primary small"></i> {{ \Carbon\Carbon::parse($customer->birthday)->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

</body>
</html>