<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Planes de OpenGym: Entrenador, Nutriólogo o Ambos. Tú eliges.">
    <title>Planes y Precios - OpenGym</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/planes.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('inicio') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
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
                        <a class="nav-link btn btn-outline-light ms-lg-2 px-3 mt-2 mt-lg-0" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="py-5 bg-light">
            <div class="container text-center">
                <h1 class="fw-bold">Elige tu Objetivo</h1>
                <p class="lead text-muted">Desde solo entrenar hasta una transformación completa.</p>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow-sm hover-effect border-0">
                            <div class="card-header text-center bg-secondary text-white py-3">
                                <h4 class="mb-0 fw-bold">Plan Acceso</h4>
                                <span class="badge bg-light text-secondary mt-1">Opción Básica</span>
                            </div>
                            <div class="card-body text-center p-4">
                                <div class="mb-4">
                                    <h2 class="fw-bold display-5">$299</h2>
                                    <p class="text-muted small">mensual</p>
                                </div>
                                <ul class="list-unstyled mb-4 text-start mx-auto small" style="max-width: 200px;">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Acceso al Gimnasio</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Área de Cardio</li>
                                    <li class="mb-2 text-muted"><i class="fas fa-times-circle text-danger me-2"></i> Sin Instructor</li>
                                    <li class="mb-2 text-muted"><i class="fas fa-times-circle text-danger me-2"></i> Sin Nutriólogo</li>
                                </ul>
                                <a href="{{ route('registro') }}" class="btn btn-outline-secondary w-100 rounded-pill">Elegir Acceso</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow hover-effect border-primary border-2">
                            <div class="card-header text-center bg-primary text-white py-3">
                                <h4 class="mb-0 fw-bold">Plan Fitness</h4>
                                <span class="badge bg-light text-primary mt-1">Con Entrenador</span>
                            </div>
                            <div class="card-body text-center p-4">
                                <div class="mb-4">
                                    <h2 class="fw-bold display-5">$499</h2>
                                    <p class="text-muted small">mensual</p>
                                </div>
                                <ul class="list-unstyled mb-4 text-start mx-auto small" style="max-width: 220px;">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Acceso Total</li>
                                    <li class="mb-2 fw-bold text-primary"><i class="fas fa-dumbbell me-2"></i> Rutina Personalizada</li>
                                    <li class="mb-2"><i class="fas fa-user-check me-2 text-success"></i> Seguimiento Instructor</li>
                                    <li class="mb-2 text-muted"><i class="fas fa-times-circle text-danger me-2"></i> Sin Nutriólogo</li>
                                </ul>
                                <a href="{{ route('registro') }}" class="btn btn-primary w-100 rounded-pill">Quiero Entrenador</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow hover-effect border-success border-2">
                            <div class="card-header text-center bg-success text-white py-3">
                                <h4 class="mb-0 fw-bold">Plan Nutri</h4>
                                <span class="badge bg-light text-success mt-1">Con Nutriólogo</span>
                            </div>
                            <div class="card-body text-center p-4">
                                <div class="mb-4">
                                    <h2 class="fw-bold display-5">$499</h2>
                                    <p class="text-muted small">mensual</p>
                                </div>
                                <ul class="list-unstyled mb-4 text-start mx-auto small" style="max-width: 220px;">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Acceso Total</li>
                                    <li class="mb-2 fw-bold text-success"><i class="fas fa-apple-alt me-2"></i> Plan Alimenticio</li>
                                    <li class="mb-2"><i class="fas fa-file-medical me-2 text-success"></i> Consulta Mensual</li>
                                    <li class="mb-2 text-muted"><i class="fas fa-times-circle text-danger me-2"></i> Sin Instructor</li>
                                </ul>
                                <a href="{{ route('registro') }}" class="btn btn-success w-100 rounded-pill">Quiero Dieta</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow-lg hover-effect border-warning border-2">
                            <div class="card-header text-center bg-dark text-white py-3">
                                <h4 class="mb-0 fw-bold text-warning">Transformación</h4>
                                <span class="badge bg-warning text-dark mt-1">¡Todo Incluido!</span>
                            </div>
                            <div class="card-body text-center p-4">
                                <div class="mb-4">
                                    <h2 class="fw-bold display-5 text-dark">$799</h2>
                                    <p class="text-muted small">mensual</p>
                                </div>
                                <ul class="list-unstyled mb-4 text-start mx-auto small" style="max-width: 220px;">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Acceso Total VIP</li>
                                    <li class="mb-2 fw-bold"><i class="fas fa-dumbbell text-primary me-2"></i> Entrenador Personal</li>
                                    <li class="mb-2 fw-bold"><i class="fas fa-apple-alt text-success me-2"></i> Nutriólogo Personal</li>
                                    <li class="mb-2"><i class="fas fa-star text-warning me-2"></i> Medición Corporal</li>
                                </ul>
                                <a href="{{ route('registro') }}" class="btn btn-dark w-100 rounded-pill text-warning fw-bold">LO QUIERO TODO</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-5 bg-white">
            <div class="container">
                <h3 class="text-center mb-4 fw-bold">Comparativa Detallada</h3>
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 30%;">Beneficio</th>
                                <th>Acceso ($299)</th>
                                <th>Fitness ($499)</th>
                                <th>Nutri ($499)</th>
                                <th class="text-warning">Transformación ($799)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start ps-4">Acceso a instalaciones</td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                                <td class="text-start ps-4">Rutina de Ejercicio</td>
                                <td class="text-muted">General</td>
                                <td><i class="fas fa-check text-primary"></i> <strong>Personalizada</strong></td>
                                <td class="text-muted">General</td>
                                <td><i class="fas fa-check text-primary"></i> <strong>Personalizada</strong></td>
                            </tr>
                            <tr>
                                <td class="text-start ps-4">Plan de Alimentación</td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-check text-success"></i> <strong>Incluido</strong></td>
                                <td><i class="fas fa-check text-success"></i> <strong>Incluido</strong></td>
                            </tr>
                            <tr>
                                <td class="text-start ps-4">Seguimiento de Medidas</td>
                                <td><i class="fas fa-times text-danger"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-check text-success"></i> <strong>Completo</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="py-5 bg-light">
            <div class="container">
                <h3 class="text-center mb-4 fw-bold">Preguntas Frecuentes</h3>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                ¿Puedo cambiar de Nutri a Fitness el próximo mes?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <strong>¡Sí, claro!</strong> Como cuestan lo mismo ($499), puedes alternar mes con mes según tu objetivo. Un mes te enfocas en la comida y el otro en la rutina.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                ¿Qué incluye el Plan Transformación?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Es el paquete completo. Tienes cita con el nutriólogo para tu dieta y cita con el instructor para tu rutina, además de acceso ilimitado. Es la opción más rápida para ver resultados.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-dark text-white py-5 mt-auto">
        <div class="container text-center">
            <p class="mb-0 small text-white-50">&copy; 2025 OpenGym. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/planes.js') }}"></script>
</body>
</html>