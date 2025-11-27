<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4>Editar Plan: {{ $plan->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.planes.update', $plan->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label>Nombre del Plan</label>
                        <input type="text" name="name" value="{{ $plan->name }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Precio</label>
                        <input type="number" name="price" step="0.01" value="{{ $plan->price }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Duración (días)</label>
                        <input type="number" name="duration_days" value="{{ $plan->duration_days }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Beneficios</label>
                        <textarea name="benefits" class="form-control">{{ $plan->benefits }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Actualizar Plan</button>
                    <a href="{{ route('admin.planes') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>