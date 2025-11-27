<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Anuncios - OpenGym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-danger mb-4">
        <div class="container">
            <span class="navbar-brand"><i class="fas fa-bullhorn me-2"></i>Tablero de Anuncios</span>
            <a href="{{ route('empleado.dashboard') }}" class="btn btn-outline-light btn-sm">Volver al Panel</a>
        </div>
    </nav>

    <div class="container">
        
        <!-- Formulario para crear anuncios -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold text-danger">
                        <i class="fas fa-plus-circle me-1"></i> Publicar Nuevo Aviso
                    </div>
                    <div class="card-body">
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('empleado.store_anuncio') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">Título del Anuncio</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Ej: Mantenimiento de regaderas..." required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">Contenido</label>
                                <textarea name="contenido" class="form-control" rows="3" placeholder="Escribe los detalles aquí..." required></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-danger px-4">Publicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Anuncios Recientes -->
        <h4 class="mb-4 text-secondary">Anuncios Recientes</h4>
        <div class="row g-4">
            @forelse($anuncios as $anuncio)
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold text-dark">{{ $anuncio->title }}</h5>
                            <span class="badge bg-light text-muted border">
                                {{ $anuncio->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                        <p class="card-text text-secondary">{{ $anuncio->content }}</p>
                    </div>
                    
                    <!-- BOTÓN ELIMINAR -->
                    <div class="card-footer bg-white border-0 d-flex justify-content-end">
                        <form action="{{ route('empleado.anuncios.destroy', $anuncio->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este anuncio?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Eliminar Anuncio">
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted">
                <i class="far fa-newspaper fa-3x mb-3"></i>
                <p>No hay anuncios publicados todavía.</p>
            </div>
            @endforelse
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>