<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - OpenGym</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
      .card:hover { transform: translateY(-5px); transition: 0.3s; cursor: pointer; }
  </style>
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-success mb-4">
    <div class="container">
      <span class="navbar-brand">Dashboard Admin</span>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-outline-light btn-sm">Cerrar Sesión</button>
      </form>
    </div>
  </nav>

  <main class="container">
    <h2 class="text-center mb-5">Panel de Administración</h2>
    <div class="row g-4">

      <div class="col-md-6">
        <div class="card h-100 text-center shadow-sm">
          <div class="card-body py-5">
            <i class="fas fa-users fa-3x mb-3 text-success"></i>
            <h5 class="card-title">Gestión de Socios</h5>
            <p class="card-text text-muted">Administra la información de los socios.</p>
            <a href="{{ route('admin.socios') }}" class="btn btn-success">Ir a sección</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 text-center shadow-sm">
          <div class="card-body py-5">
            <i class="fas fa-user-tie fa-3x mb-3 text-success"></i>
            <h5 class="card-title">Gestión de Empleados</h5>
            <p class="card-text text-muted">Controla los datos del personal.</p>
            <a href="{{ route('admin.empleados') }}" class="btn btn-success">Ir a sección</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 text-center shadow-sm">
          <div class="card-body py-5">
            <i class="fas fa-chart-line fa-3x mb-3 text-success"></i>
            <h5 class="card-title">Reportes</h5>
            <p class="card-text text-muted">Estadísticas e ingresos.</p>
            <a href="{{ route('admin.reportes') }}" class="btn btn-success">Ir a sección</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 text-center shadow-sm">
          <div class="card-body py-5">
            <i class="fas fa-dumbbell fa-3x mb-3 text-success"></i>
            <h5 class="card-title">Gestión de Planes</h5>
            <p class="card-text text-muted">Modifica los precios y membresías.</p>
            <a href="{{ route('admin.planes') }}" class="btn btn-success">Ir a sección</a>
          </div>
        </div>
      </div>

    </div>
  </main>
</body>
</html>