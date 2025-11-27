<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Mi Perfil</span>
            <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-light btn-sm">Volver al Dashboard</a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="card shadow border-0 rounded-4 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-white border-0 text-center pt-4">
                <h3 class="fw-bold text-primary">Información Personal</h3>
            </div>
            <div class="card-body p-4">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('socio.perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h5 class="text-secondary mb-3 border-bottom pb-2">Datos Generales</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted small">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $usuario->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-muted small">Apellido</label>
                            <input type="text" name="apellido" class="form-control" value="{{ $usuario->lastname }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">Email (No editable)</label>
                        <input type="email" class="form-control bg-light" value="{{ $usuario->email }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted small">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $usuario->phone ?? '' }}" required>
                    </div>

                    <h5 class="text-secondary mb-3 border-bottom pb-2 mt-4">Seguridad (Opcional)</h5>
                    <div class="alert alert-info small">
                        <i class="fas fa-lock me-1"></i> Solo llena estos campos si deseas cambiar tu contraseña.
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">Nueva Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres">
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted small">Confirmar Nueva Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary rounded-pill fw-bold">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>