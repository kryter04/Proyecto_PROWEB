<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow border-0 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Registrar Pago</h5>
                <a href="{{ route('empleado.dashboard') }}" class="btn btn-sm btn-dark">Volver</a>
            </div>
            <div class="card-body p-4">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('empleado.store_pago') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Seleccionar Socio</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">Buscar socio...</option>
                            @foreach($socios as $socio)
                                <option value="{{ $socio->id }}">{{ $socio->name }} {{ $socio->lastname }} ({{ $socio->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Monto ($)</label>
                        <input type="number" step="0.01" name="monto" class="form-control" placeholder="0.00" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Concepto</label>
                        <select name="concepto" class="form-select">
                            <option value="Mensualidad">Mensualidad</option>
                            <option value="Inscripción">Inscripción</option>
                            <option value="Producto">Compra de Producto</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Registrar Cobro</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>