<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">
            <div class="card-header bg-success text-white"><h4>Registrar Socio</h4></div>
            <div class="card-body">
                <form action="{{ route('admin.socios.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Apellido</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Contraseña Temporal</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-success w-100">Guardar</button>
                    <a href="{{ route('admin.socios') }}" class="btn btn-link w-100 mt-2 text-muted">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>