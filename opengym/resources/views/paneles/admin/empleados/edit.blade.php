<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">
            <div class="card-header bg-warning text-dark"><h4>Editar Empleado: {{ $empleado->name }}</h4></div>
            <div class="card-body">
                <form action="{{ route('admin.empleados.update', $empleado->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row mb-3">
                        <div class="col">
                            <label>Nombre</label>
                            <input type="text" name="name" value="{{ $empleado->name }}" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Apellido</label>
                            <input type="text" name="lastname" value="{{ $empleado->lastname }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Email (No editable)</label>
                        <input type="email" value="{{ $empleado->email }}" class="form-control bg-light" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="phone" value="{{ $empleado->phone }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nueva Contraseña (Opcional)</label>
                        <input type="password" name="password" class="form-control" placeholder="Dejar vacío si no se cambia">
                    </div>
                    <button class="btn btn-warning w-100">Actualizar</button>
                    <a href="{{ route('admin.empleados') }}" class="btn btn-link w-100 mt-2 text-muted">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>