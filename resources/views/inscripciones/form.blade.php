<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($inscripcion) ? 'Editar' : 'Nueva' }} Inscripción</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">{{ isset($inscripcion) ? 'Editar' : 'Nueva' }} Inscripción</h1>

    <form method="POST" action="{{ isset($inscripcion) ? route('inscripciones.update', $inscripcion) : route('inscripciones.store') }}">
        @csrf
        @if(isset($inscripcion))
            @method('PUT')
        @endif

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text"
                   name="codigo"
                   id="codigo"
                   value="{{ old('codigo', $inscripcion->codigo ?? '') }}"
                   class="form-control"
                   {{ isset($inscripcion) ? 'readonly' : '' }}
                   required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date"
                   name="fecha"
                   id="fecha"
                   value="{{ old('fecha', $inscripcion->fecha ?? '') }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="cui_alumno" class="form-label">Alumno</label>
            <select name="cui_alumno" id="cui_alumno" class="form-control" required>
                <option value="">Seleccione un alumno</option>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->cui }}"
                        {{ old('cui_alumno', $inscripcion->cui_alumno ?? '') == $alumno->cui ? 'selected' : '' }}>
                        {{ $alumno->nombre_alumno }} ({{ $alumno->cui }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">{{ isset($inscripcion) ? 'Actualizar' : 'Guardar' }}</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
