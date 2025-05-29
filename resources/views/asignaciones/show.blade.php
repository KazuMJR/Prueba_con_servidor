<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Asignación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4"><i class="bi bi-bookmark-check-fill"></i> Detalle de Asignación</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary"><i class="bi bi-123"></i> Información de la asignación</h5>
            <p class="mb-2"><strong>ID Asignación:</strong> {{ $asignacion->id_asignacion }}</p>
            <p class="mb-2"><strong>Código Inscripción:</strong> {{ $asignacion->inscripcion->codigo ?? 'N/A' }}</p>
        </div>
    </div>

    @if($asignacion->escuela)
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-building"></i> Escuela</h5>
                <p class="mb-0">{{ $asignacion->escuela->nombre_escuela }}</p>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i> No hay escuela asignada.
        </div>
    @endif

    @if($asignacion->seccion)
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-person-lines-fill"></i> Sección</h5>
                <p class="mb-0">{{ $asignacion->seccion->letra }}</p>
            </div>
        </div>
    @endif

    @if($asignacion->grado)
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-mortarboard-fill"></i> Grado</h5>
                <p class="mb-0">{{ $asignacion->grado->nombre_grado }}</p>
            </div>
        </div>
    @endif

    @if($asignacion->catedratico)
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-person-badge-fill"></i> Catedrático</h5>
                <p class="mb-0">{{ $asignacion->catedratico->nombre_catedratico }}</p>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i> No hay catedrático asignado.
        </div>
    @endif

    @if($asignacion->curso)
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-journal-bookmark-fill"></i> Curso</h5>
                <p class="mb-0">{{ $asignacion->curso->nombre_curso }}</p>
            </div>
        </div>
    @endif

    <div class="mt-4 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('asignaciones.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('asignaciones.edit', $asignacion) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form method="POST" action="{{ route('asignaciones.destroy', $asignacion) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta asignación?');">
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
