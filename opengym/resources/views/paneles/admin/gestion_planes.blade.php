<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Gestión de Planes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-success mb-4">
    <div class="container">
      <span class="navbar-brand"><i class="fas fa-dumbbell me-2"></i>Gestión de Planes</span>
      <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">
        <i class="fas fa-arrow-left me-1"></i>Volver al Dashboard
      </a>
    </div>
  </nav>

  <main class="container">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Planes Disponibles</h2>
        <a href="{{ route('admin.planes.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-1"></i>Agregar nuevo plan
        </a>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
          <thead class="table-success">
            <tr>
              <th class="ps-4">ID</th>
              <th>Nombre del Plan</th>
              <th>Precio</th>
              <th>Duración</th>
              <th class="text-end pe-4">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($planes as $plan)
            <tr>
              <td class="ps-4 fw-bold text-muted">#{{ $plan->id }}</td>
              <td>{{ $plan->name }}</td>
              <td class="text-success fw-bold">${{ number_format($plan->price, 2) }}</td>
              <td>{{ $plan->duration_days }} días</td>
              <td class="text-end pe-4">
                
                <a href="{{ route('admin.planes.edit', $plan->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                
                <form action="{{ route('admin.planes.destroy', $plan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el plan {{ $plan->name }}?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>

              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center py-5 text-muted">
                <i class="fas fa-box-open fa-3x mb-3"></i><br>
                No hay planes registrados todavía.
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>