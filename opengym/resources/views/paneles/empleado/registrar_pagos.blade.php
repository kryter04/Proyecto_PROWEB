<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow border-0 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-cash-register me-2"></i>Registrar Pago</h5>
                <a href="{{ route('empleado.dashboard') }}" class="btn btn-sm btn-dark">Volver</a>
            </div>
            <div class="card-body p-4">

                <!-- Mensaje de éxito general (ej. Pago registrado) -->
                @if(session('success'))
                    <div class="alert alert-success border-start border-success border-4">
                        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('empleado.store_pago') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Seleccionar Socio</label>
                        <!-- El borde cambia de color si hay un usuario preseleccionado para llamar la atención -->
                        <select name="user_id" id="user_select" class="form-select {{ isset($usuarioPreseleccionado) ? 'border-success border-2' : 'border-warning' }}" required onchange="actualizarDatosPago()">
                            <option value="" data-precio="0" data-concepto="">Buscar socio...</option>
                            @foreach($socios as $socio)
                                @php
                                    // Lógica simple para determinar concepto y precio sugerido
                                    // Buscamos su última membresía para ver el precio del plan
                                    $membresia = \App\Models\Membership::where('user_id', $socio->id)->latest()->first();
                                    $precioPlan = $membresia ? $membresia->plan->price : 0;
                                    
                                    // Si tiene membresía pero no pagos registrados, es probable que sea Inscripción
                                    $tienePagos = \App\Models\Payment::where('user_id', $socio->id)->exists();
                                    $conceptoSugerido = $tienePagos ? 'Mensualidad' : 'Inscripción';
                                @endphp
                                <option value="{{ $socio->id }}" 
                                    data-precio="{{ $precioPlan }}" 
                                    data-concepto="{{ $conceptoSugerido }}"
                                    data-nombre="{{ $socio->name }} {{ $socio->lastname }}"
                                    {{ (isset($usuarioPreseleccionado) && $usuarioPreseleccionado == $socio->id) ? 'selected' : '' }}>
                                    {{ $socio->name }} {{ $socio->lastname }} ({{ $socio->email }})
                                </option>
                            @endforeach
                        </select>
                        
                        <!-- Mensaje de ayuda si viene de otra pantalla -->
                        @if(isset($usuarioPreseleccionado))
                            <div class="form-text text-success fw-bold mt-1">
                                <i class="fas fa-arrow-up"></i> Socio seleccionado automáticamente tras la operación anterior.
                            </div>
                        @endif
                    </div>

                    <!-- Información visual del socio seleccionado -->
                    <div id="info_socio" class="alert alert-info d-none mb-3">
                        <strong><i class="fas fa-user"></i> Socio:</strong> <span id="span_nombre_socio"></span><br>
                        <strong><i class="fas fa-tag"></i> Sugerencia:</strong> <span id="span_concepto_sugerido"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Monto ($)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="monto" id="monto_input" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Método de Pago</label>
                            <select name="metodo_pago" class="form-select" required>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Concepto</label>
                        <select name="concepto" id="concepto_select" class="form-select">
                            <option value="Mensualidad">Mensualidad</option>
                            <option value="Inscripción">Inscripción</option>
                            <option value="Producto">Compra de Producto</option>
                            <option value="Visita">Visita de un día</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold btn-lg shadow-sm">
                        <i class="fas fa-save me-2"></i>Registrar Cobro
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function actualizarDatosPago() {
            var select = document.getElementById('user_select');
            var selectedOption = select.options[select.selectedIndex];
            
            var precio = selectedOption.getAttribute('data-precio');
            var concepto = selectedOption.getAttribute('data-concepto');
            var nombre = selectedOption.getAttribute('data-nombre');

            // Actualizar campos
            if (precio && precio > 0) {
                document.getElementById('monto_input').value = precio;
            } else {
                document.getElementById('monto_input').value = ''; // Limpiar si no hay precio fijo
            }

            if (concepto) {
                document.getElementById('concepto_select').value = concepto;
            }

            // Mostrar alerta informativa
            var infoBox = document.getElementById('info_socio');
            if (nombre) {
                document.getElementById('span_nombre_socio').textContent = nombre;
                document.getElementById('span_concepto_sugerido').textContent = concepto + " ($" + precio + ")";
                infoBox.classList.remove('d-none');
            } else {
                infoBox.classList.add('d-none');
            }
        }

        // Ejecutar al cargar la página por si hay un usuario preseleccionado
        window.onload = function() {
            actualizarDatosPago();
        };
    </script>
</body>
</html>