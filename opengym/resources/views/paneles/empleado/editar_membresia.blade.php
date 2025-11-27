<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Membresía</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Gestión de Membresía</span>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0"><i class="fas fa-user-edit me-2"></i>Socio: {{ $socio->name }} {{ $socio->lastname }}</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <div class="alert {{ $membresia ? 'alert-info' : 'alert-warning' }} mb-4">
                            <h5 class="alert-heading fw-bold"><i class="fas fa-info-circle me-1"></i> Estado Actual:</h5>
                            <hr>
                            @if($membresia)
                                <p class="mb-1"><strong>Plan Activo:</strong> {{ $membresia->plan->name ?? 'Plan Eliminado' }}</p>
                                <p class="mb-0"><strong>Vencimiento:</strong> {{ \Carbon\Carbon::parse($membresia->end_date)->format('d/m/Y') }}</p>
                            @else
                                <p class="mb-0">Este usuario no tiene ninguna membresía activa.</p>
                            @endif
                        </div>

                        <form action="{{ route('empleado.membresia.update', $socio->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label fw-bold h5">Seleccionar Nuevo Plan / Renovación</label>
                                <select name="plan_id" class="form-select form-select-lg border-primary">
                                    @foreach($planes as $plan)
                                        <option value="{{ $plan->id }}" 
                                            @if($membresia && $membresia->plan_id == $plan->id) selected @endif>
                                            {{ $plan->name }} - ${{ number_format($plan->price, 2) }} ({{ $plan->duration_days }} días)
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text mt-2 text-muted">
                                    <i class="fas fa-exclamation-triangle"></i> Al guardar, la vigencia se reiniciará a partir de hoy.
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-5">
                                <a href="{{ route('empleado.consultar', ['busqueda' => $socio->email]) }}" class="btn btn-secondary px-4">Cancelar</a>
                                <button type="submit" class="btn btn-primary px-4 fw-bold">Actualizar Membresía</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>