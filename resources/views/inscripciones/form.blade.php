<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($inscripcion) Editar Inscripción @else Crear Inscripción @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">
        @isset($inscripcion)
            <i class="bi bi-pencil-square"></i> Editar Inscripción
        @else
            <i class="bi bi-journal-plus"></i> Crear Inscripción
        @endisset
    </h1>

    <a href="{{ route('inscripciones.index') }}" class="btn btn-outline-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver al listado
    </a>

    <form method="POST" action="@isset($inscripcion) {{ route('inscripciones.update', $inscripcion) }} @else {{ route('inscripciones.store') }} @endisset"
          class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @isset($inscripcion)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="codigo" class="form-label">Código <span class="text-danger">*</span></label>
            <input type="text" name="codigo" id="codigo" class="form-control"
                   value="{{ old('codigo', $inscripcion->codigo ?? '') }}"
                   @isset($inscripcion) readonly @endisset required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha <span class="text-danger">*</span></label>
            <input type="date" name="fecha" id="fecha" class="form-control"
                   value="{{ old('fecha', $inscripcion->fecha ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="alumno_busqueda" class="form-label">Buscar Alumno (nombre o CUI)</label>
            <input type="text" class="form-control" id="alumno_busqueda" placeholder="Escriba para filtrar...">
        </div>

        <div class="mb-3">
            <label for="cui_alumno" class="form-label">Alumno <span class="text-danger">*</span></label>
            <select name="cui_alumno" id="cui_alumno" class="form-select" required>
                <option value="">Seleccione un alumno</option>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->cui }}"
                            data-nombre="{{ strtolower($alumno->nombre_alumno) }}"
                            data-cui="{{ strtolower($alumno->cui) }}"
                            {{ old('cui_alumno', $inscripcion->cui_alumno ?? '') == $alumno->cui ? 'selected' : '' }}>
                        {{ $alumno->nombre_alumno }} ({{ $alumno->cui }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i>
                @isset($inscripcion) Actualizar @else Guardar @endisset
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Filtro en tiempo real para el select -->
<script>
    document.getElementById('alumno_busqueda').addEventListener('input', function () {
        const filtro = this.value.toLowerCase();
        const opciones = document.querySelectorAll('#cui_alumno option');

        opciones.forEach((opcion, index) => {
            if (index === 0) return; // Mantener visible la opción por defecto
            const nombre = opcion.dataset.nombre;
            const cui = opcion.dataset.cui;
            opcion.hidden = !(nombre.includes(filtro) || cui.includes(filtro));
        });
    });
</script>

</body>
</html>
