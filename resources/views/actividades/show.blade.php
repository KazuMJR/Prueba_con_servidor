<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Actividad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/show.css') }}">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Detalle de la Actividad</h1>

    <div class="card p-4 mb-3">
        <p><strong>ID de Actividad:</strong> {{ $actividad->id_actividad }}</p>
        <p><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
    </div>

    <div class="d-flex justify-content-start gap-2">
        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Volver al listado</a>
        <a href="{{ route('actividades.edit', $actividad->id_actividad) }}" class="btn btn-warning">Editar actividad</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
