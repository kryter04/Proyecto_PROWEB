<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Historial de Pagos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

  <nav class="navbar navbar-dark bg-secondary mb-4">
    <div class="container">
      <span class="navbar-brand"><i class="fas fa-history me-2"></i>Historial de Pagos</span>
      <a href="{{ route('socio.dashboard') }}" class="btn btn-outline-light btn-sm">Volver</a>
    </div>
  </nav>

  <main class="container">
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
              <thead class="table-secondary">
                <tr>
                  <th>Fecha</th>
                  <th>Concepto</th>
                  <th>Monto</th>
                </tr>
              </thead>
              <tbody>
                @forelse($pagos as $pago)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($pago->payment_date)->format('d/m/Y') }}</td>
                  <td>{{ $pago->concept ?? 'Pago de Membresía' }}</td>
                  <td class="fw-bold text-success">${{ number_format($pago->amount, 2) }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center py-4">No tienes pagos registrados.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
        </div>
    </div>
  </main>

</body>
</html>