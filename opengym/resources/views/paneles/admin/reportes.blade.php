<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Reportes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-success mb-4">
    <div class="container">
      <span class="navbar-brand">Reportes y Estadísticas</span>
      <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Volver</a>
    </div>
  </nav>

  <main class="container">
    <h2 class="mb-4 text-center">Resumen General</h2>
    
    <div class="row g-4 text-center">
        
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body py-4">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5 class="card-title text-muted">Total de Socios</h5>
                    <h2 class="fw-bold">{{ $totalSocios }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body py-4">
                    <i class="fas fa-user-tie fa-3x text-warning mb-3"></i>
                    <h5 class="card-title text-muted">Total de Empleados</h5>
                    <h2 class="fw-bold">{{ $totalEmpleados }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body py-4">
                    <i class="fas fa-money-bill-wave fa-3x text-success mb-3"></i>
                    <h5 class="card-title text-muted">Ingresos Totales</h5>
                    <h2 class="fw-bold text-success">${{ number_format($ingresos, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <button class="btn btn-outline-secondary" disabled>Generar reporte PDF (Próximamente)</button>
    </div>
  </main>

</body>
</html>