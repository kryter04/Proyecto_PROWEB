<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - OpenGym</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    
    <link rel="stylesheet" href="assets/css/login.css">
    
    <link rel="icon" href="assets/img/logo.png">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                        <h3 class="mb-0 fw-bold">Iniciar Sesión</h3>
                    </div>
                    <div class="card-body p-5">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email *</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="tu@email.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Contraseña *</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="••••••••" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="recordar">
                                <label class="form-check-label" for="recordar">Recordarme</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-3 btn-lg rounded-pill">Iniciar Sesión</button>
                            
                            <div class="text-center">
                                <a href="#" class="text-decoration-none small">¿Olvidaste tu contraseña?</a>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <div class="text-center">
                            <p class="mb-2 text-muted">¿No tienes una cuenta?</p>
                            <a href="{{ route('registro') }}" class="btn btn-outline-primary rounded-pill px-4">Regístrate</a>
                        </div>
                    </div>
                    <div class="card-footer bg-white text-center py-3 border-0 rounded-bottom-4">
                        <a href="{{ route('inicio') }}" class="text-decoration-none fw-bold small">
                            <i class="fas fa-arrow-left me-1"></i> Volver al inicio
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/login.js"></script> 
</body>
</html>