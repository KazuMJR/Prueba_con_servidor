<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/show.css') }}">
</head>
<body>

    <div class="container">
        <h1>Detalles del Alumno</h1>

        <div class="card">
            <p><strong>CUI:</strong> {{ $alumno->cui }}</p>
            <p><strong>Nombre:</strong> {{ $alumno->nombre_alumno }}</p>
            <p><strong>Edad:</strong> {{ $alumno->edad }}</p>
            <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
            <p><strong>Inscripción Código:</strong> {{ $alumno->inscripcion_codigo }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('alumnos.index') }}">Volver al listado</a>
        </div>
    </div>

</body>
</html>
