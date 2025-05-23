@php
    $editing = isset($calendario_examen);
@endphp

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $editing ? 'Editar Examen' : 'Agregar Examen' }} - MINEDUC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">{{ $editing ? 'Editar Examen' : 'Agregar Nuevo Examen' }}</h1>

    <form action="{{ $editing ? route('calendarios.update', $calendario_examen->id_examen) : route('calendarios.store') }}" method="POST">
        @csrf
        @if($editing)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date"
                   name="fecha"
                   id="fecha"
                   class="form-control"
                   value="{{ old('fecha', $editing && $calendario_examen->fecha ? \Carbon\Carbon::parse($calendario_examen->fecha)->format('Y-m-d') : '') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion"
                      id="descripcion"
                      class="form-control"
                      rows="4"
                      required>{{ old('descripcion', $editing ? $calendario_examen->descripcion : '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            {{ $editing ? 'Actualizar' : 'Guardar' }}
        </button>
        <a href="{{ route('calendarios.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
