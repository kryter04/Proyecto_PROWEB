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
    
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('inicio') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo OpenGym" width="30" height="30" class="d-inline-block align-text-top me-2">
                OpenGym
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    
                    <li class="nav-item"><a class="nav-link" href="{{ route('inicio') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('acerca') }}">Acerca</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('planes') }}">Planes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contacto') }}">Contacto</a></li>
                    <li class="nav-item">

                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-lg-2 px-3 mt-2 mt-lg-0" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="flex-grow-1">

        <!-- Sección Principal: Título y Bienvenida -->
        <section class="py-5 bg-light border-bottom">
            <div class="container text-center">
                <h1 class="display-4 fw-bold text-dark mb-3">Conoce OpenGym</h1>
                <p class="lead text-secondary">
                    Somos el gimnasio moderno que te ofrece más que solo máquinas: te ofrecemos una comunidad y el camino hacia tu mejor versión.
                </p>
            </div>
        </section>

        <!-- Sección 2: Nuestra Historia y Filosofía -->
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h2 class="h2 fw-bold text-primary mb-4">Nuestra Historia</h2>
                        <p class="fs-5 text-secondary">
                            OpenGym nació en 2018 con la visión de romper el molde de los gimnasios tradicionales. Vimos la necesidad de un espacio donde la tecnología y el confort se unieran para crear una experiencia de entrenamiento superior, accesible para todos, sin importar su nivel de fitness.
                        </p>
                        <p class="text-muted">
                            Desde una pequeña sala de entrenamiento en la ciudad hasta convertirnos en un referente regional, nuestra misión siempre ha sido la misma: proveer las herramientas, el apoyo y la motivación para que **Tu mejor versión empiece aquí.**
                        </p>
                    </div>
                    <div class="col-lg-6 text-center">
                        <!-- Imagen de Gimnasio o comunidad -->
                        <img src="{{ asset('assets/img/bg_gym.png') }}" alt="Equipo de OpenGym" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección 3: Misión, Visión y Valores -->
        <section class="py-5 bg-light border-top border-bottom">
            <div class="container">
                <h2 class="text-center fw-bold mb-5">Nuestros Pilares</h2>
                <div class="row g-4 text-center">
                    
                    <!-- Misión -->
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <i class="fas fa-bullseye feature-icon-lg mb-3"></i>
                            <h4 class="fw-bold text-dark">Misión</h4>
                            <p class="text-muted">
                                Transformar vidas ofreciendo una experiencia de fitness innovadora, inclusiva y personalizada. Queremos que cada miembro se sienta empoderado para alcanzar sus objetivos.
                            </p>
                        </div>
                    </div>

                    <!-- Visión -->
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <i class="fas fa-rocket feature-icon-lg mb-3"></i>
                            <h4 class="fw-bold text-dark">Visión</h4>
                            <p class="text-muted">
                                Ser el líder regional en el sector fitness, reconocido por nuestra tecnología, la calidad de nuestros entrenadores y el ambiente de comunidad inigualable.
                            </p>
                        </div>
                    </div>

                    <!-- Valores -->
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <i class="fas fa-hands-helping feature-icon-lg mb-3"></i>
                            <h4 class="fw-bold text-dark">Valores</h4>
                            <p class="text-muted">
                                Innovación, Comunidad, Integridad y Compromiso con los resultados de nuestros clientes.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Sección 4: Por qué Elegir OpenGym (Copiado de inicio.blade.php) -->
        <section class="py-5">
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

    </main>

    <section class="py-5 bg-primary text-white">
            <div class="container text-center">
                <h2 class="fw-bold mb-3">¿Listo para comenzar tu transformación?</h2>
                <p class="mb-4 fs-5">Únete a miles de personas que ya están alcanzando sus metas fitness.</p>
                <a href="{{ route('planes') }}" class="btn btn-light text-primary fw-bold btn-lg rounded-pill px-5 shadow">Explora nuestros planes</a>
            </div>
        </section>

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
                        <li class="mb-2"><a href="{{ route('inicio') }}" class="text-white-50 text-decoration-none hover-white">Inicio</a></li>
                        <li class="mb-2"><a href="{{ route('acerca') }}" class="text-white-50 text-decoration-none hover-white">Acerca de</a></li>
                        <li class="mb-2"><a href="{{ route('planes') }}" class="text-white-50 text-decoration-none hover-white">Planes</a></li>
                        <li class="mb-2"><a href="{{ route('contacto') }}" class="text-white-50 text-decoration-none hover-white">Contacto</a></li>
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