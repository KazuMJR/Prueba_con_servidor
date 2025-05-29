<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Inscripción</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4"><i class="bi bi-file-earmark-text-fill"></i> Detalle de Inscripción</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary"><i class="bi bi-123"></i> Información de la inscripción</h5>
            <p class="mb-2"><strong>Código:</strong> {{ $inscripcion->codigo }}</p>
            <p class="mb-2"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha)->format('d/m/Y') }}</p>
        </div>
    </div>

    @if($inscripcion->alumno)
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-person-lines-fill"></i> Datos del Alumno</h5>
                <p class="mb-2"><strong>Nombre:</strong> {{ $inscripcion->alumno->nombre_alumno }}</p>
                <p class="mb-2"><strong>Edad:</strong> {{ $inscripcion->alumno->edad }}</p>
                <p class="mb-0"><strong>Sexo:</strong> {{ $inscripcion->alumno->sexo == 'M' ? 'Masculino' : 'Femenino' }}</p>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i> No hay alumno asignado a esta inscripción.
        </div>
    @endif

    <div class="mt-4 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('inscripciones.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('inscripciones.edit', $inscripcion) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form method="POST" action="{{ route('inscripciones.destroy', $inscripcion) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta inscripción?');">
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
