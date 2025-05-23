<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Escuela</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/show.css') }}">

</head>
<body>

    <div class="container">
        <h1>Detalles de la Escuela</h1>

        <div class="card">
            <p><strong>Nombre:</strong> {{ $escuela->nombre_escuela }}</p>
            <p><strong>Dirección:</strong> {{ $escuela->direccion }}</p>
            <p><strong>Código Establecimiento:</strong> {{ $escuela->codigo_establecimiento }}</p>
            <p><strong>Zona:</strong> {{ $escuela->zona }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('escuelas.index') }}">Volver al listado</a>
        </div>
    </div>

</body>
</html>
