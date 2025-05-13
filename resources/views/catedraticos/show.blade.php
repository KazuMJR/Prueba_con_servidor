<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Catedrático</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/show.css') }}">
</head>
<body>

<div class="container">
    <h1>Detalles del Catedrático</h1>

    <div class="card">
        <p><strong>CUI:</strong> {{ $catedratico->cui }}</p>
        <p><strong>Nombre:</strong> {{ $catedratico->nombre_catedratico }}</p>
        <p><strong>Edad:</strong> {{ $catedratico->edad }}</p>
        <p><strong>Sexo:</strong> {{ $catedratico->sexo }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('catedraticos.index') }}">Volver al listado</a>
    </div>
</div>

</body>
</html>
