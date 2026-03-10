<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRFILMS - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f0f0f;
            color: #ffffff;
            /* Background sutil para manter o estilo cinema sem o header */
            background-image: radial-gradient(circle at top right, #1a1a1a, #0f0f0f);
            min-height: 100vh;
        }

        /* Fix para a Navbar não ser sobreposta */
        .navbar {
            position: relative;
            z-index: 1050; /* Garante que fica acima dos cards em hover */
            background-color: rgba(15, 15, 15, 0.9);
            backdrop-filter: blur(10px); /* Efeito de vidro moderno */
        }

        .card-portal {
            background: #1a1a1a;
            border: 1px solid #333;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 15px;
        }

        .card-portal:hover {
            transform: translateY(-8px);
            border-color: #0d6efd;
            box-shadow: 0 10px 30px rgba(13, 110, 253, 0.15);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
            margin: 0 auto 1.5rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top pt-3 pb-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-primary" href="#">BR<span class="text-white">FILMS</span></a>
            <div class="d-flex align-items-center">
                <span class="badge bg-dark border border-secondary text-secondary fw-normal d-none d-md-inline">
                    <i class="bi bi-cpu me-1"></i> v1.0.2-beta
                </span>
            </div>
        </div>
    </nav>

    <main class="container mt-5 pt-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Painel de Controle</h2>
            <p class="text-secondary">Selecione o módulo que deseja gerenciar abaixo</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
            
            <div class="col">
                <div class="card card-portal h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box">
                            <i class="bi bi-people-fill text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title fw-bold">Usuários</h4>
                        <p class="card-text text-secondary small mb-4">
                            Gestão de clientes, assinaturas e novos cadastros de espectadores.
                        </p>
                        <div class="d-grid">
                            <a href="{{ url('/users/create') }}" class="btn btn-primary fw-bold py-2">
                                Abrir Módulo
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-portal h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box">
                            <i class="bi bi-shield-lock text-warning" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="card-title fw-bold">Operadores</h4>
                        <p class="card-text text-secondary small mb-4">
                            Administração interna e permissões para colaboradores do sistema.
                        </p>
                        <div class="d-grid">
                            <button class="btn btn-outline-secondary fw-bold py-2" disabled>
                                <i class="bi bi-lock me-2"></i>Em Breve
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            </div>
    </main>

    <footer class="container text-center py-5 mt-5">
        <p class="text-secondary mb-0" style="font-size: 0.8rem;">
            &copy; {{ date('Y') }} BRFILMS | Desenvolvido com Laravel & Bootstrap
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>