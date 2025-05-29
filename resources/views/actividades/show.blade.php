<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Actividad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Quitar referencia a show.css para usar solo bootstrap -->
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">
        <i class="bi bi-journal-text"></i> Detalle de la Actividad
    </h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">
                <i class="bi bi-card-text"></i> Información general
            </h5>
            <p class="mb-0"><strong>ID de Actividad:</strong> {{ $actividad->id_actividad }}</p>
            <p class="mb-0"><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between flex-wrap gap-2 align-items-center">
        <a href="{{ route('actividades.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('actividades.edit', $actividad->id_actividad) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form method="POST" action="{{ route('actividades.destroy', $actividad->id_actividad) }}" 
                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad?');" class="m-0">
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
