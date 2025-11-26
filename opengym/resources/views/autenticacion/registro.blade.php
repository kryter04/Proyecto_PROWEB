<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate - OpenGym</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="assets/css/registro.css"> 
    <link rel="icon" href="assets/img/logo.png">
</head>
<body class="bg-light py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                        <h3 class="mb-0 fw-bold">Crear Cuenta</h3>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('registro') }}" method="POST">
                            @csrf <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label fw-bold">Nombre *</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellido" class="form-label fw-bold">Apellido *</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label fw-bold">Teléfono *</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Contraseña *</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terminos" required>
                                <label class="form-check-label small" for="terminos">Acepto los términos y condiciones</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3 btn-lg rounded-pill">Registrarse</button>
                        </form>
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="mb-2 text-muted">¿Ya tienes cuenta?</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">Iniciar Sesión</a>
                        </div>
                    </div>
                    <div class="card-footer bg-white text-center py-3 border-0 rounded-bottom-4">
                        <a href="{{ route('inicio') }}" class="text-decoration-none fw-bold small">Volver al inicio</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>