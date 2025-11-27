<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Membresía</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-success mb-4">
        <div class="container">
            <span class="navbar-brand">Estado de Membresía</span>
            <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-light btn-sm">Volver</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <!-- TARJETA PRINCIPAL -->
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5 text-center">
                        
                        @if($estado === 'activo')
                            <!-- CASO: TIENE PLAN ACTIVO -->
                            <h2 class="text-success fw-bold mb-2">Plan Activo</h2>
                            <div class="display-1 text-success mb-3"><i class="fas fa-check-circle"></i></div>
                            
                            <h3 class="fw-bold text-dark">{{ $membresia->plan->name }}</h3>
                            <p class="text-muted mb-4">Tu suscripción está al corriente.</p>

                            <div class="card bg-light border-0 p-3 text-start mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Inicio:</span>
                                    <strong>{{ \Carbon\Carbon::parse($membresia->start_date)->format('d/m/Y') }}</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Vencimiento:</span>
                                    <strong class="text-danger">{{ \Carbon\Carbon::parse($membresia->end_date)->format('d/m/Y') }}</strong>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Tiempo restante:</span>
                                    <span class="badge bg-success rounded-pill px-3 py-2">{{ intval($diasRestantes) }} días</span>
                                </div>
                            </div>

                        @elseif($estado === 'vencido')
                            <!-- CASO: PLAN VENCIDO -->
                            <h2 class="text-danger fw-bold mb-2">Plan Vencido</h2>
                            <div class="display-1 text-danger mb-3"><i class="fas fa-exclamation-circle"></i></div>
                            
                            <h4 class="text-muted mb-3">Tu plan <strong>{{ $membresia->plan->name }}</strong> ha expirado.</h4>
                            <p class="alert alert-warning small">
                                <i class="fas fa-info-circle me-1"></i>
                                Acude con un empleado en recepción para renovar tu acceso.
                            </p>

                        @else
                            <!-- CASO: SIN PLAN (NUNCA HA PAGADO O NO TIENE REGISTRO) -->
                            <h2 class="text-secondary fw-bold mb-2">Sin Plan</h2>
                            <div class="display-1 text-secondary mb-3 opacity-50"><i class="fas fa-user-slash"></i></div>
                            
                            <p class="lead mb-4">Actualmente no tienes un plan de gimnasio activo.</p>
                            
                            <div class="alert alert-secondary small text-start">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Nota:</strong> Para activar tu cuenta, debes acudir a recepción. Un empleado te ayudará a seleccionar tu plan y procesar el pago.
                            </div>
                        @endif

                        <!-- BOTONES DE ACCIÓN -->
                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('socio.ver_planes') }}" class="btn btn-outline-primary rounded-pill">
                                <i class="fas fa-list me-2"></i>Ver catálogo de planes
                            </a>
                            <a href="{{ route('socio.historial') }}" class="btn btn-outline-secondary rounded-pill">
                                <i class="fas fa-history me-2"></i>Ver mi historial
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>