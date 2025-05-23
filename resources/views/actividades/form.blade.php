@php
    $editing = isset($actividad) && $actividad !== null;
@endphp

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $editing ? 'Editar Actividad' : 'Agregar Actividad' }} - MINEDUC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">{{ $editing ? 'Editar Actividad' : 'Agregar Nueva Actividad' }}</h1>

    <form action="{{ $editing ? route('actividades.update', $actividad->id_actividad) : route('actividades.store') }}" method="POST">
        @csrf
        @if($editing)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{ old('descripcion', $editing ? $actividad->descripcion : '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            {{ $editing ? 'Actualizar' : 'Guardar' }}
        </button>
        <a href="{{ route('actividades.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
