<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Horarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .fade-out {
            opacity: 1;
            transition: opacity 1s ease-out;
        }
        .fade-out.hidden {
            opacity: 0;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Horarios Registrados</h1>

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
        <a href="{{ url('/') }}" class="btn btn-secondary d-flex align-items-center">
            <i class="bi bi-arrow-left-circle me-2"></i> Volver al Panel
        </a>
        <a href="{{ route('horario_clase.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> Crear Horario
        </a>
    </div>

    @if(session('success'))
        <div id="successMessage" class="alert alert-success fade-out">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div id="errorMessage" class="alert alert-danger fade-out">
            {{ session('error') }}
        </div>
    @endif

    @if($horarios->isEmpty())
        <div class="alert alert-info">No hay horarios registrados aún.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Día</th>
                    <th>Aula</th>
                    <th class="text-center" style="min-width: 180px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($horarios as $horario)
                    <tr>
                        <td>{{ $horario->id_horario }}</td>
                        <td>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</td>
                        <td>{{ $horario->dia }}</td>
                        <td>{{ $horario->aula }}</td>
                        <td class="text-center">
                            <a href="{{ route('horario_clase.show', $horario->id_horario) }}" class="btn btn-info btn-sm me-1" title="Ver horario">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="{{ route('horario_clase.edit', $horario->id_horario) }}" class="btn btn-warning btn-sm me-1" title="Editar horario">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('horario_clase.destroy', $horario->id_horario) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este horario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar horario">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Animación para ocultar mensajes -->
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        setTimeout(() => {
            if (successMessage) successMessage.classList.add('hidden');
            if (errorMessage) errorMessage.classList.add('hidden');
        }, 3000); // Ocultar después de 3 segundos
    });
</script>

</body>
</html>
