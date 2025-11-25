<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Consultar Información - Empleado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/estilos.css" rel="stylesheet" />
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-warning fixed-top">
    <div class="container-fluid">
      <span class="navbar-brand">Consultar Información</span>
      <a href="empleado.html" class="btn btn-outline-dark">Volver</a>
    </div>
  </nav>

  <!-- Contenido principal -->
  <main class="container pt-5 mt-4">
    <h2 class="mb-4">Buscar datos de socios</h2>
    <form class="row g-3 mb-4">
      <div class="col-md-6">
        <label for="criterio" class="form-label">Buscar por nombre o ID</label>
        <input type="text" class="form-control" id="criterio" placeholder="Ej. Juan Pérez o 001" />
      </div>
      <div class="col-md-6 d-flex align-items-end">
        <button type="submit" class="btn btn-warning w-100">Buscar</button>
      </div>
    </form>

    <h3>Resultados</h3>
    <table class="table table-bordered table-hover mt-3">
      <thead class="table-warning">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Plan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>001</td><td>Juan Pérez</td><td>juan@example.com</td><td>555-1234</td><td>Premium</td>
        </tr>
        <!-- Más resultados aquí -->
      </tbody>
    </table>
  </main>

  <script src="../js/scripts.js"></script>
</body>
</html>
