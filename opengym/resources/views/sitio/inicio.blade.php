<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="OpenGym - Gimnasio moderno con planes accesibles">
    <title>OpenGym - Tu Gimnasio Moderno</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo OpenGym" width="30" height="30" class="d-inline-block align-text-top me-2">
                OpenGym
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/acerca.html">Acerca</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/planes.html">Planes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/contacto.html">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-lg-2 px-3 mt-2 mt-lg-0" href="login.html">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>

        <section class="hero-section py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-4 fw-bold text-dark mb-4">Transforma tu Vida con <span class="text-primary">OpenGym</span></h1>
                        <p class="lead text-secondary mb-4">El gimnasio moderno que se adapta a tus necesidades y objetivos personales.</p>
                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                            <a href="pages/planes.html" class="btn btn-success btn-lg rounded-pill px-4">Ver Planes</a>
                            <a href="pages/contacto.html" class="btn btn-outline-primary btn-lg rounded-pill px-4">Contáctanos</a>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                        <img src="assets/img/bg_gym.png" alt="Entrenamiento en OpenGym" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">¿Por qué elegir OpenGym?</h2>
                    <p class="text-muted">Las ventajas que te ofrecemos para lograr tus metas</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 text-center border-0 shadow-sm hover-effect">
                            <div class="card-body p-4">
                                <div class="feature-icon mb-3 bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3">
                                    <i class="fas fa-dumbbell fa-3x text-primary"></i>
                                </div>
                                <h5 class="card-title fw-bold">Equipamiento Moderno</h5>
                                <p class="card-text text-muted">Máquinas de última generación y equipamiento profesional para todos los niveles.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center border-0 shadow-sm hover-effect">
                            <div class="card-body p-4">
                                <div class="feature-icon mb-3 bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3">
                                    <i class="fas fa-users fa-3x text-primary"></i>
                                </div>
                                <h5 class="card-title fw-bold">Entrenadores Pro</h5>
                                <p class="card-text text-muted">Personal calificado para ayudarte a alcanzar tus metas de forma segura.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center border-0 shadow-sm hover-effect">
                            <div class="card-body p-4">
                                <div class="feature-icon mb-3 bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3">
                                    <i class="fas fa-calendar-check fa-3x text-primary"></i>
                                </div>
                                <h5 class="card-title fw-bold">Horarios Flexibles</h5>
                                <p class="card-text text-muted">Abierto en horarios extendidos para adaptarse a tu estilo de vida.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 bg-primary text-white">
            <div class="container text-center">
                <h2 class="fw-bold mb-3">¿Listo para comenzar tu transformación?</h2>
                <p class="mb-4 fs-5">Únete a miles de personas que ya están alcanzando sus metas fitness.</p>
                <a href="pages/planes.html" class="btn btn-light text-primary fw-bold btn-lg rounded-pill px-5 shadow">Explora nuestros planes</a>
            </div>
        </section>

    </main>


    <footer class="bg-dark text-white py-5 mt-auto">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">OpenGym</h5>
                    <p class="small text-white-50">El gimnasio moderno que se adapta a tus necesidades y objetivos personales. Tu mejor versión empieza aquí.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.html" class="text-white-50 text-decoration-none hover-white">Inicio</a></li>
                        <li class="mb-2"><a href="pages/acerca.html" class="text-white-50 text-decoration-none hover-white">Acerca de</a></li>
                        <li class="mb-2"><a href="pages/planes.html" class="text-white-50 text-decoration-none hover-white">Planes</a></li>
                        <li class="mb-2"><a href="pages/contacto.html" class="text-white-50 text-decoration-none hover-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Contacto</h5>
                    <p class="small text-white-50 mb-2"><i class="fas fa-map-marker-alt me-2"></i> Av. Principal 123, Ciudad</p>
                    <p class="small text-white-50 mb-2"><i class="fas fa-phone me-2"></i> (555) 123-4567</p>
                    <p class="small text-white-50 mb-2"><i class="fas fa-envelope me-2"></i> info@opengym.com</p>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center">
                <p class="small text-white-50 mb-0">&copy; 2025 OpenGym. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>