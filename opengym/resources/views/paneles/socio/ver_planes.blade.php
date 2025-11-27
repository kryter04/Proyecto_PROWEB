<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Planes Disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Nuestros Planes</span>
            <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-light btn-sm">Volver</a>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mb-5">
            <h2>Encuentra tu plan ideal</h2>
            <p class="text-muted">Analiza las opciones y solicítalo en recepción.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($planes as $plan)
            <div class="col-md-4">
                <div class="card h-100 shadow border-0 hover-top">
                    <div class="card-header bg-white text-center py-4 border-0">
                        <h4 class="fw-bold text-primary">{{ $plan->name }}</h4>
                        <h1 class="display-5 fw-bold">${{ number_format($plan->price, 0) }}</h1>
                        <span class="text-muted">por {{ $plan->duration_days }} días</span>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <!-- Si tienes beneficios guardados, los mostramos, si no, uno genérico -->
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Acceso total al gimnasio</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Duchas y vestuarios</li>
                            @if($plan->benefits)
                                <li class="mb-2"><i class="fas fa-star text-warning me-2"></i>{{ $plan->benefits }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4 text-center">
                        <!-- Este botón es solo informativo, ya que el socio debe ir a recepción -->
                        <button class="btn btn-outline-primary rounded-pill w-75" disabled>Solicitar en Recepción</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    No hay planes configurados actualmente.
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>