<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Gestión de Empleados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
      <span class="navbar-brand">Gestión de Empleados</span>
      <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Volver</a>
    </div>
  </nav>

  <main class="container">
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Equipo de Trabajo</h2>
      <a href="{{ route('admin.empleados.create') }}" class="btn btn-primary">
          <i class="fas fa-plus me-1"></i> Nuevo Empleado
      </a>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-primary">
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th class="text-end">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($empleados as $emp)
            <tr>
              <td>{{ $emp->id }}</td>
              <td>{{ $emp->name }} {{ $emp->lastname }}</td>
              <td>{{ $emp->email }}</td>
              <td>{{ $emp->phone }}</td>
              <td class="text-end">
                <a href="{{ route('admin.empleados.edit', $emp->id) }}" class="btn btn-sm btn-outline-warning">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.empleados.destroy', $emp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Despedir/Eliminar a este empleado?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
              </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4">No hay empleados registrados.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>