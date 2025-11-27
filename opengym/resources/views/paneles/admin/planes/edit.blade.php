<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Editar Plan: {{ $plan->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.planes.update', $plan->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label class="form-label">Nombre del Plan</label>
                        <input type="text" name="name" value="{{ $plan->name }}" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio ($)</label>
                            <input type="number" name="price" step="0.01" value="{{ $plan->price }}" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Duración (días)</label>
                            <input type="number" name="duration_days" value="{{ $plan->duration_days }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Beneficios</label>
                        <textarea name="benefits" class="form-control" rows="3">{{ $plan->benefits }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.planes') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>