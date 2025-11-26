<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Buscar Socio</h2>
        
        <form action="{{ route('empleado.consultar') }}" method="GET" class="card p-3 shadow-sm border-0 mb-4">
            <div class="input-group">
                <input type="text" name="busqueda" class="form-control" placeholder="Nombre, apellido o email..." value="{{ $busqueda }}">
                <button class="btn btn-primary" type="submit">Buscar</button>
                <a href="{{ route('empleado.dashboard') }}" class="btn btn-outline-secondary">Volver</a>
            </div>
        </form>

        @if(count($socios) > 0)
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($socios as $socio)
                        <tr>
                            <td>{{ $socio->name }} {{ $socio->lastname }}</td>
                            <td>{{ $socio->email }}</td>
                            <td>{{ $socio->phone }}</td>
                            <td><span class="badge bg-success">Activo</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @elseif($busqueda)
            <div class="alert alert-warning">No se encontraron socios con "{{ $busqueda }}"</div>
        @endif
    </div>
</body>
</html>