<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRFILMS - Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #0a0a0a;
            --card-bg: #141414;
            --primary: #0d6efd;
            --border: #333;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: #ffffff;
            background-image: radial-gradient(circle at 0% 0%, #1a1a1a 0%, #0a0a0a 50%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--border);
            z-index: 1050;
        }

        .version-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            color: #aaa;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        /* Redução de espaçamentos para subir o conteúdo */
        .main-content {
            flex: 1;
            padding-top: 2rem; /* Reduzido de 4rem */
        }

        .page-header {
            margin-bottom: 2.5rem; /* Espaço entre título e cards */
        }

        .card-portal {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .card-portal:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 15px 30px rgba(13, 110, 253, 0.15);
        }

        .icon-badge {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            font-size: 2.2rem;
            color: white;
        }

        .icon-primary {
            background: linear-gradient(135deg, var(--primary), #004085);
            box-shadow: 0 8px 16px rgba(13, 110, 253, 0.2);
        }

        .icon-warning {
            background: linear-gradient(135deg, #ffc107, #b38600);
            box-shadow: 0 8px 16px rgba(255, 193, 7, 0.1);
        }

        .btn-portal {
            border-radius: 12px;
            font-weight: 700;
            padding: 10px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-2">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-primary" href="{{ url('/') }}">BR<span class="text-white">FILMS</span></a>
            <div class="ms-auto">
                <span class="version-badge d-none d-md-inline-flex align-items-center">
                    <i class="bi bi-cpu text-secondary me-2"></i> v1.0.2-beta
                </span>
            </div>
        </div>
    </nav>

    <main class="container main-content">
        <div class="text-center page-header">
            <h2 class="fw-bold text-white mb-1">Painel de Controle</h2>
            <p class="text-secondary small">Selecione o módulo para gerenciamento</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center mx-auto" style="max-width: 850px;">
            
            <div class="col">
                <div class="card card-portal h-100 p-1">
                    <div class="card-body p-4 text-center d-flex flex-column">
                        <div class="icon-badge icon-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold text-white mb-2">Espectadores</h4>
                        <p class="card-text text-secondary small mb-4 flex-grow-1">
                            Gestão de clientes, assinaturas e novos cadastros.
                        </p>
                        <div class="d-grid">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary btn-portal">
                                ACESSAR MÓDULO
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-portal h-100 p-1 opacity-75">
                    <div class="card-body p-4 text-center d-flex flex-column">
                        <div class="icon-badge icon-warning">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold text-white mb-2">Operadores</h4>
                        <p class="card-text text-secondary small mb-4 flex-grow-1">
                            Administração interna e níveis de permissão.
                        </p>
                        <div class="d-grid">
                            <button class="btn btn-dark btn-portal text-secondary border-secondary" disabled>
                                <i class="bi bi-lock-fill me-2"></i>EM BREVE
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="container text-center py-4 mt-auto">
        <p class="text-secondary mb-0 fw-medium" style="font-size: 0.75rem;">
            &copy; {{ date('Y') }} BRFILMS | Laravel Framework
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>