<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Actividades</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <h1 class="mb-4">Actividades Registradas</h1>

    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary me-2">Volver al Panel</a>
        <a href="{{ route('actividades.create') }}" class="btn btn-primary">Agregar Actividad</a>
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

    @if($actividades->isEmpty())
        <div class="alert alert-info">No hay actividades registradas aún.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th style="width: 180px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->id_actividad }}</td>
                        <td>{{ $actividad->descripcion }}</td>
                        <td>
                            <a href="{{ route('actividades.show', $actividad->id_actividad) }}" class="btn btn-sm btn-info me-1">Ver</a>
                            <a href="{{ route('actividades.edit', $actividad->id_actividad) }}" class="btn btn-sm btn-warning me-1">Editar</a>
                            <form action="{{ route('actividades.destroy', $actividad->id_actividad) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta actividad?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Bootstrap JS -->
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
