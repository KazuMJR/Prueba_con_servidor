<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Examen - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Si tienes estilos personalizados, descomenta esta línea y ajusta la ruta -->
    <!-- <link rel="stylesheet" href="{{ asset('styles/show.css') }}"> -->
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Detalle del Examen</h1>

    <div class="card p-4 mb-4 shadow-sm">
        <p><strong>ID:</strong> {{ $calendario->id_examen }}</p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($calendario->fecha)->format('d/m/Y') }}</p>
        <p><strong>Descripción:</strong> {{ $calendario->descripcion }}</p>
    </div>

    <div class="mb-3">
        <a href="{{ route('calendarios.index') }}" class="btn btn-secondary me-2">Volver</a>
        <a href="{{ route('calendarios.edit', $calendario->id_examen) }}" class="btn btn-warning">Editar</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
