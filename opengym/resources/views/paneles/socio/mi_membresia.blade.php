<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Membresía - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-success mb-4">
        <div class="container">
            <span class="navbar-brand">Estado de Membresía</span>
            <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-light btn-sm">Volver</a>
        </div>
    </nav>

    <div class="container text-center">
        <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 500px;">
            <div class="card-body p-5">
                <h2 class="text-success fw-bold mb-3">Plan Activo</h2>
                
                <div class="display-1 text-success mb-3"><i class="fas fa-check-circle"></i></div>
                
                <h4 class="mb-4">Tu cuenta está activa</h4>
                
                <ul class="list-group list-group-flush text-start mb-4">
                    <li class="list-group-item">Vencimiento: value="{{ $usuario->email }}" readonly</strong></li>
                    <li class="list-group-item">Estado: <span class="badge bg-success">Al corriente</span></li>
                </ul>

                <button class="btn btn-outline-success w-100 rounded-pill">Ver historial de pagos</button>
            </div>
        </div>
    </div>

</body>
</html>