<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Empleado - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card-menu { transition: transform 0.3s; cursor: pointer; }
        .card-menu:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-5">
        <div class="container">
            <span class="navbar-brand mb-0 h1"><i class="fas fa-user-tie me-2"></i>Empleado: {{ $usuario->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light btn-sm">Cerrar Sesión</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('empleado.altas') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 border-0 shadow-sm text-center py-4 text-primary">
                        <div class="card-body">
                            <i class="fas fa-user-plus fa-3x mb-3"></i>
                            <h5 class="card-title">Alta de Socios</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="{{ route('empleado.consultar') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 border-0 shadow-sm text-center py-4 text-success">
                        <div class="card-body">
                            <i class="fas fa-search fa-3x mb-3"></i>
                            <h5 class="card-title">Consultar Info</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="{{ route('empleado.pagos') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 border-0 shadow-sm text-center py-4 text-warning">
                        <div class="card-body">
                            <i class="fas fa-cash-register fa-3x mb-3"></i>
                            <h5 class="card-title">Registrar Pagos</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="{{ route('empleado.anuncios') }}" class="text-decoration-none">
                    <div class="card card-menu h-100 border-0 shadow-sm text-center py-4 text-danger">
                        <div class="card-body">
                            <i class="fas fa-bullhorn fa-3x mb-3"></i>
                            <h5 class="card-title">Anuncios</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>