<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Inscripción</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Detalle de Inscripción</h1>

    <div class="card mb-3" style="max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title">Código: {{ $inscripcion->codigo }}</h5>
            <p class="card-text"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha)->format('d/m/Y') }}</p>

            @if($inscripcion->alumno)
                <hr>
                <h6>Datos del Alumno</h6>
                <p><strong>Nombre:</strong> {{ $inscripcion->alumno->nombre_alumno }}</p>
                <p><strong>Edad:</strong> {{ $inscripcion->alumno->edad }}</p>
                <p><strong>Sexo:</strong> {{ $inscripcion->alumno->sexo }}</p>
            @else
                <p class="text-muted">No hay alumno asignado a esta inscripción.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary me-2">Volver</a>
    <a href="{{ route('inscripciones.edit', $inscripcion) }}" class="btn btn-warning">Editar</a>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
