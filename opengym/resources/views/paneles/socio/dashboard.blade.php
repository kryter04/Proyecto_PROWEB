<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Socio - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary fixed-top">
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

    <div class="container mt-5 pt-5">
        <div class="row g-4 text-center">
            
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="card-body p-5">
                        <div class="mb-3 text-primary">
                            <i class="fas fa-user-circle fa-4x"></i>
                        </div>
                        <h3 class="card-title fw-bold">Mi Perfil</h3>
                        <p class="text-muted">Consulta y edita tu información personal.</p>
                        <a href="{{ route('socio.perfil') }}" class="btn btn-primary rounded-pill px-4">Ir a perfil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 hover-effect">
                    <div class="card-body p-5">
                        <div class="mb-3 text-success">
                            <i class="fas fa-id-card fa-4x"></i>
                        </div>
                        <h3 class="card-title fw-bold">Mi Membresía</h3>
                        <p class="text-muted">Revisa tu plan actual y su vigencia.</p>
                        <a href="{{ route('socio.membresia') }}" class="btn btn-success rounded-pill px-4">Ver membresía</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>