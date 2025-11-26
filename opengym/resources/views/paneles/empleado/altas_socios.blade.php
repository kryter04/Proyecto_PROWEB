<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Registrar Nuevo Socio</h4>
                <a href="{{ route('empleado.dashboard') }}" class="btn btn-sm btn-outline-light">Volver</a>
            </div>
            <div class="card-body p-4">
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('empleado.store_socio') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contraseña Temporal</label>
                            <input type="password" name="password" class="form-control" required minlength="8">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Plan Inicial</label>
                            <select name="plan_id" class="form-select" required>
                                <option value="">Selecciona un plan...</option>
                                @foreach($planes as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }} - ${{ $plan->price }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">Guardar Socio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>