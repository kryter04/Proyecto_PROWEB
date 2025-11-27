<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Información</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand"><i class="fas fa-search me-2"></i>Consultar Socios</span>
            <a href="{{ route('empleado.dashboard') }}" class="btn btn-outline-light btn-sm">Volver al Dashboard</a>
        </div>
    </nav>

    <div class="container">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('empleado.consultar') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre o email..." value="{{ $busqueda ?? '' }}">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-search"></i> Buscar</button>
                </form>
            </div>
        </div>

        @if(isset($busqueda))
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Resultados para: "<strong>{{ $busqueda }}</strong>"</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Nombre Completo</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th class="text-end pe-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($socios as $socio)
                            <tr>
                                <td class="ps-4 fw-bold">{{ $socio->name }} {{ $socio->lastname }}</td>
                                <td>{{ $socio->email }}</td>
                                <td>{{ $socio->phone }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('empleado.membresia.edit', $socio->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-id-card me-1"></i> Renovar / Plan
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fas fa-user-slash fa-2x mb-3"></i><br>
                                    No se encontraron socios con esa información.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</body>
</html>