<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Empleado - OpenGym</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/estilos.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-warning fixed-top">
    <div class="container-fluid">
      <span class="navbar-brand">Dashboard Empleado</span>
      <a href="" class="btn btn-outline-dark">Cerrar sesión</a>
    </div>
  </nav>

  <!-- Contenido principal -->
  <main class="container pt-5 mt-4">
    <h2 class="text-center mb-4">Panel del Empleado</h2>
    <div class="row g-4">

      <!-- Registrar Pagos -->
      <div class="col-md-6">
        <div class="card h-100 text-center">
          <div class="card-body">
            <i class="fas fa-cash-register fa-2x mb-3 text-warning"></i>
            <h5 class="card-title">Registrar Pagos</h5>
            <p class="card-text">Registra los pagos realizados por los socios.</p>
            <a href="{{ route('registrar_pagos') }}" class="btn btn-warning">Ir a sección</a>
          </div>
        </div>
      </div>

      <!-- Alta de Socios -->
      <div class="col-md-6">
        <div class="card h-100 text-center">
          <div class="card-body">
            <i class="fas fa-user-plus fa-2x mb-3 text-warning"></i>
            <h5 class="card-title">Alta de Socios</h5>
            <p class="card-text">Agrega nuevos socios al sistema de forma rápida.</p>
            <a href="{{ route('altas_socios') }}" class="btn btn-warning">Ir a sección</a>
          </div>
        </div>
      </div>

      <!-- Consultar Información -->
      <div class="col-md-6">
        <div class="card h-100 text-center">
          <div class="card-body">
            <i class="fas fa-search fa-2x mb-3 text-warning"></i>
            <h5 class="card-title">Consultar Información</h5>
            <p class="card-text">Busca datos de socios, pagos o membresías.</p>
            <a href="{{ route('consultar_info') }}" class="btn btn-warning">Ir a sección</a>
          </div>
        </div>
      </div>

      <!-- Anuncios -->
      <div class="col-md-6">
        <div class="card h-100 text-center">
          <div class="card-body">
            <i class="fas fa-bullhorn fa-2x mb-3 text-warning"></i>
            <h5 class="card-title">Anuncios</h5>
            <p class="card-text">Publica o revisa comunicados internos del gimnasio.</p>
            <a href="{{ route('anuncios_empleado') }}" class="btn btn-warning">Ir a sección</a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>