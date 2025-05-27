<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Tutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4"><i class="bi bi-person-vcard"></i> Detalles del Tutor</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary"><i class="bi bi-card-text"></i> Información general</h5>
            <p class="mb-2"><strong>CUI del Tutor:</strong> {{ $tutelar->cui_tutor }}</p>
            <p class="mb-2"><strong>Nombre del Tutor:</strong> {{ $tutelar->nombre_tutor }}</p>
            <p class="mb-2"><strong>Teléfono:</strong> {{ $tutelar->telefono ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <h5 class="card-title text-primary"><i class="bi bi-person-circle"></i> Información del Alumno</h5>
            <p class="mb-2"><strong>CUI del Alumno:</strong> {{ $tutelar->cui_alumno }}</p>
            <p class="mb-0"><strong>Nombre del Alumno:</strong> {{ $tutelar->alumno->nombre_alumno ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('tutelares.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('tutelares.edit', ['cui_alumno' => $tutelar->cui_alumno, 'cui_tutor' => $tutelar->cui_tutor]) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form method="POST" action="{{ route('tutelares.destroy', ['cui_alumno' => $tutelar->cui_alumno, 'cui_tutor' => $tutelar->cui_tutor]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tutor?');">
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
