<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Programa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/show.css') }}">
</head>
<body>
<div class="container">
    <h1>Detalles del Programa</h1>

    <div class="card">
        <p><strong>Grado:</strong> {{ $programa->grado->nombre_grado }}</p>
        <p><strong>Curso:</strong> {{ $programa->curso->nombre_curso }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('programas.index') }}">Volver al listado</a>
    </div>
</div>
</body>
</html>
