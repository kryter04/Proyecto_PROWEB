<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Socio - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hover-effect:hover { transform: translateY(-5px); transition: 0.3s; cursor: pointer; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-5">
        <div class="container">
            <span class="navbar-brand fw-bold">
                <i class="fas fa-dumbbell me-2"></i>Hola, {{ $usuario->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Cerrar Sesión</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row g-4 text-center">
            
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="card-body py-4">
                        <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Mi Perfil</h5>
                        <a href="{{ route('socio.perfil') }}" class="btn btn-outline-primary btn-sm mt-2">Ir a perfil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="card-body py-4">
                        <i class="fas fa-id-card fa-3x text-success mb-3"></i>
                        <h5 class="card-title fw-bold">Mi Membresía</h5>
                        <a href="{{ route('socio.membresia') }}" class="btn btn-outline-success btn-sm mt-2">Ver estado</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="card-body py-4">
                        <i class="fas fa-bullhorn fa-3x text-warning mb-3"></i>
                        <h5 class="card-title fw-bold">Anuncios</h5>
                        <a href="{{ route('socio.anuncios') }}" class="btn btn-outline-warning btn-sm mt-2">Ver avisos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="card-body py-4">
                        <i class="fas fa-history fa-3x text-secondary mb-3"></i>
                        <h5 class="card-title fw-bold">Historial Pagos</h5>
                        <a href="{{ route('socio.historial') }}" class="btn btn-outline-secondary btn-sm mt-2">Consultar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>