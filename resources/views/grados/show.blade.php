<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Grado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/show.css') }}">
</head>
<body>

<div class="container">
    <h1>Detalles del Grado</h1>

    <div class="card">
        <p><strong>Nombre:</strong> {{ $grado->nombre_grado }}</p>
        <p><strong>Nivel Educativo:</strong> {{ $grado->nivel_educativo }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('grados.index') }}">Volver al listado</a>
    </div>
</div>

</body>
</html>
