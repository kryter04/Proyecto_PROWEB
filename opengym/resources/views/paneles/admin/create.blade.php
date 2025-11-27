<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4>Nuevo Plan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.planes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nombre del Plan</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Precio</label>
                        <input type="number" name="price" step="0.01" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Duración (días)</label>
                        <input type="number" name="duration_days" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Beneficios (Opcional)</label>
                        <textarea name="benefits" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Guardar Plan</button>
                    <a href="{{ route('admin.planes') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>