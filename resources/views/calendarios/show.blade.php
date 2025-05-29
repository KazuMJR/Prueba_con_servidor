<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Examen - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">
        <i class="bi bi-journal-text"></i> Detalle del Examen
    </h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">
                <i class="bi bi-card-text"></i> Información general
            </h5>
            <p class="mb-0"><strong>ID del Examen:</strong> {{ $calendario->id_examen }}</p>
            <p class="mb-0"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($calendario->fecha)->format('d/m/Y') }}</p>
            <p class="mb-0"><strong>Descripción:</strong> {{ $calendario->descripcion }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between flex-wrap gap-2 align-items-center">
        <a href="{{ route('calendarios.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('calendarios.edit', $calendario->id_examen) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form method="POST" action="{{ route('calendarios.destroy', $calendario->id_examen) }}" 
                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este examen?');" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash3"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
