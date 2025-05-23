<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Curso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/show.css') }}">
</head>
<body>
<div class="container">
    <h1>Detalles del Curso</h1>

    <div class="card">
        <p><strong>Nombre:</strong> {{ $curso->nombre_curso }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('cursos.index') }}">Volver al listado</a>
    </div>
</div>
</body>
</html>
