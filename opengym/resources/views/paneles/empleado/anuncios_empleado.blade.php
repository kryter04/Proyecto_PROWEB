<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Anuncios - Empleado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/estilos.css" rel="stylesheet" />
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-warning fixed-top">
    <div class="container-fluid">
      <span class="navbar-brand">Anuncios del Gimnasio</span>
      <a href="empleado.html" class="btn btn-outline-dark">Volver</a>
    </div>
  </nav>

  <!-- Contenido principal -->
  <main class="container pt-5 mt-4">
    <h2 class="mb-4">Publicar nuevo anuncio</h2>
    <form class="mb-5">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título del anuncio</label>
        <input type="text" class="form-control" id="titulo" required />
      </div>
      <div class="mb-3">
        <label for="contenido" class="form-label">Contenido</label>
        <textarea class="form-control" id="contenido" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-warning w-100">Publicar anuncio</button>
    </form>

    <h3>Anuncios recientes</h3>
    <ul class="list-group">
      <li class="list-group-item">
        <strong>¡Nueva clase de yoga!</strong><br />
        A partir del lunes 27, se abre el horario de yoga a las 7:00 AM.
      </li>
      <li class="list-group-item">
        <strong>Mantenimiento de máquinas</strong><br />
        El área de pesas estará cerrada el viernes por mantenimiento.
      </li>
      <!-- Más anuncios aquí -->
    </ul>
  </main>

  <script src="../js/scripts.js"></script>
</body>
</html>
