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

        <section class="py-5 bg-light">
            <div class="container">
                
                <!-- Encabezado -->
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold text-dark mb-3">Ponte en Contacto</h1>
                    <p class="lead text-secondary">
                        El gimnasio moderno que se adapta a tus necesidades y objetivos personales. Tu mejor versión empieza aquí.
                    </p>
                </div>

                <div class="row g-5">
                    
                    <!-- Columna 1: Información de Contacto (Se mantiene) -->
                    <div class="col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h2 class="h4 fw-bold text-primary mb-4 border-bottom pb-2">Nuestros Datos</h2>
                            
                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-3 mt-1"></i>
                                <div>
                                    <p class="fw-bold mb-0">Dirección</p>
                                    <p class="text-muted small">Av. Principal 123, Ciudad</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-phone fa-2x text-primary me-3 mt-1"></i>
                                <div>
                                    <p class="fw-bold mb-0">Teléfono</p>
                                    <p class="text-muted small">(555) 123-4567</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-4">
                                <i class="fas fa-envelope fa-2x text-primary me-3 mt-1"></i>
                                <div>
                                    <p class="fw-bold mb-0">Correo Electrónico</p>
                                    <p class="text-muted small">info@opengym.com</p>
                                </div>
                            </div>

                            <p class="small fst-italic text-secondary mt-4">
                                Estamos aquí para responder cualquier duda sobre nuestros planes o instalaciones.
                            </p>
                        </div>
                    </div>

                    <!-- Columna 2: Redes Sociales (Reemplaza el Formulario) -->
                    <div class="col-lg-8">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100 d-flex flex-column justify-content-center">
                            <h2 class="h4 fw-bold text-primary mb-4">Mándanos un Mensaje Directo</h2>
                            <p class="lead text-secondary mb-4">
                                ¿Prefieres usar tus apps favoritas? Escríbenos directamente a través de nuestras redes sociales y te responderemos de inmediato.
                            </p>
                            
                            <div class="d-grid gap-3">
                                
                                <!-- Botón de WhatsApp -->
                                <a href="https://wa.me/5551234567" target="_blank" class="btn btn-success btn-lg rounded-pill px-5 shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="fab fa-whatsapp fa-2x me-3"></i>
                                    Chatear por WhatsApp
                                </a>

                                <!-- Botón de Instagram -->
                                <a href="https://instagram.com/opengym" target="_blank" class="btn btn-dark btn-lg rounded-pill px-5 shadow-sm d-flex align-items-center justify-content-center" style="background-color: #E1306C; border-color: #E1306C;">
                                    <i class="fab fa-instagram fa-2x me-3"></i>
                                    Mensaje Directo en Instagram
                                </a>

                                <!-- Botón de Facebook Messenger -->
                                <a href="https://m.me/opengym" target="_blank" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-messenger fa-2x me-3"></i>
                                    Mensaje por Messenger
                                </a>
                                
                                <!-- Botón de Twitter/X (Ejemplo) -->
                                <a href="https://x.com/opengym" target="_blank" class="btn btn-dark btn-lg rounded-pill px-5 shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="fab fa-twitter fa-2x me-3"></i>
                                    Escríbenos en X
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección del Mapa -->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Encuéntranos Aquí</h2>
                <div class="map-container shadow-lg">
                    <!-- Iframe de Google Maps con la ubicación de ejemplo -->
                    <iframe 
                        src="https://maps.google.com/maps?q=Av.%20Principal%20123,%20Ciudad&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                        class="map-iframe w-100 h-100"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Ubicación de OpenGym">
                    </iframe>
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