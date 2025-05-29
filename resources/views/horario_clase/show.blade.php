<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Detalle del Horario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS + Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

</head>
<body>

<div class="container py-4">
    <h1 class="mb-4"><i class="bi bi-clock-history"></i> Detalle del Horario</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary"><i class="bi bi-info-circle"></i> Información general</h5>

            <p class="mb-2"><strong>ID:</strong> {{ $horario->id_horario }}</p>
            <p class="mb-2"><strong>Hora Inicio:</strong> {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</p>
            <p class="mb-2"><strong>Hora Fin:</strong> {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</p>
            <p class="mb-2"><strong>Día:</strong> {{ $horario->dia }}</p>
            <p class="mb-0"><strong>Aula:</strong> {{ $horario->aula }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('horario_clase.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>

        <div class="d-flex gap-2">
            <a href="{{ route('horario_clase.edit', $horario) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <form method="POST" action="{{ route('horario_clase.destroy', $horario) }}"
                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este horario?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash3"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
