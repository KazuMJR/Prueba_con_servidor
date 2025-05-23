<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Sección</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/show.css') }}">
</head>
<body>
<div class="container">
    <h1>Detalles de la Sección</h1>

    <div class="card">
        <p><strong>Letra:</strong> {{ $seccion->letra }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('secciones.index') }}">Volver al listado</a>
    </div>
</div>
</body>
</html>
