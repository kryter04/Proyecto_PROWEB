<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Anuncios del Gym</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-warning mb-4">
    <div class="container">
      <span class="navbar-brand text-dark fw-bold"><i class="fas fa-bullhorn me-2"></i>Avisos Importantes</span>
      <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-dark btn-sm">Volver</a>
    </div>
  </nav>

  <main class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            @forelse($anuncios as $anuncio)
                <div class="card shadow-sm mb-3 border-start border-warning border-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-warning">{{ $anuncio->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted" style="font-size: 0.8rem">
                            Publicado el: {{ $anuncio->created_at->format('d/m/Y') }}
                        </h6>
                        <p class="card-text mt-3">{{ $anuncio->content }}</p>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    No hay anuncios nuevos por el momento.
                </div>
            @endforelse
        </div>
    </div>
  </main>

</body>
</html>