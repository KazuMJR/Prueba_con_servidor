<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Inscripción</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/show.css') }}">
</head>
<body>

    <div class="container">
        <h1>Detalles de la Inscripción</h1>

        <div class="card">
            <p><strong>Código:</strong> {{ $inscripcion->codigo }}</p>
            <p><strong>Fecha:</strong> {{ $inscripcion->fecha }}</p>
            <p><strong>Alumno:</strong> {{ $inscripcion->alumno->nombre_alumno }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('inscripciones.index') }}">Volver al listado</a>
        </div>
    </div>

</body>
</html>
