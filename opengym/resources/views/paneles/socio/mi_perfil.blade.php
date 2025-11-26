<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Mi Perfil</span>
            <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-light btn-sm">Volver al Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow border-0 rounded-4 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-white border-0 text-center pt-4">
                <h3 class="fw-bold text-primary">Información Personal</h3>
            </div>
            <div class="card-body p-4">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted small">Nombre</label>
                            <input type="text" class="form-control" value="{{ $usuario->name }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted small">Apellido</label>
                            <input type="text" class="form-control" value="{{ $usuario->lastname }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">Email</label>
                        <input type="email" class="form-control" value="{{ $usuario->email }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">Teléfono</label>
                        <input type="text" class="form-control" value="{{ $usuario->phone ?? 'No registrado' }}" readonly>
                    </div>

                    <div class="alert alert-info small" role="alert">
                        <i class="fas fa-info-circle me-1"></i> Para actualizar tus datos, contacta a recepción.
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>