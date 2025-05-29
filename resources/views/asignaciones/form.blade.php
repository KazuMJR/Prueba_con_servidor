<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($asignacion) Editar Asignación @else Crear Asignación @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">
        @isset($asignacion)
            <i class="bi bi-pencil-square"></i> Editar Asignación
        @else
            <i class="bi bi-journal-plus"></i> Crear Asignación
        @endisset
    </h1>

    <a href="{{ route('asignaciones.index') }}" class="btn btn-outline-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver al listado
    </a>

    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> Por favor corrija los siguientes errores:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="@isset($asignacion) {{ route('asignaciones.update', $asignacion) }} @else {{ route('asignaciones.store') }} @endisset"
          class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @isset($asignacion)
            @method('PUT')
        @endisset

        <!-- Buscar Inscripción -->
        <div class="mb-3">
            <label for="inscripcion_busqueda" class="form-label">Buscar Inscripción (código o alumno)</label>
            <input type="text" class="form-control" id="inscripcion_busqueda" placeholder="Escriba para filtrar...">
        </div>
        <!-- Inscripción -->
        <div class="mb-3">
            <label for="inscripcion_codigo" class="form-label">Código Inscripción <span class="text-danger">*</span></label>
            <select name="inscripcion_codigo" id="inscripcion_codigo" class="form-select" required>
                <option value="">Seleccione una inscripción</option>
                @foreach ($inscripciones as $inscripcion)
                    <option value="{{ $inscripcion->codigo }}"
                        data-codigo="{{ strtolower($inscripcion->codigo) }}"
                        data-alumno="{{ strtolower($inscripcion->alumno->nombre_alumno ?? '') }}"
                        {{ old('inscripcion_codigo', $asignacion->inscripcion_codigo ?? '') == $inscripcion->codigo ? 'selected' : '' }}>
                        {{ $inscripcion->codigo }} - {{ $inscripcion->alumno->nombre_alumno ?? 'Alumno desconocido' }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buscar Escuela -->
        <div class="mb-3">
            <label for="escuela_busqueda" class="form-label">Buscar Escuela</label>
            <input type="text" class="form-control" id="escuela_busqueda" placeholder="Escriba para filtrar...">
        </div>
        <!-- Escuela -->
        <div class="mb-3">
            <label for="escuela_id_escuela" class="form-label">Escuela <span class="text-danger">*</span></label>
            <select name="escuela_id_escuela" id="escuela_id_escuela" class="form-select" required>
                <option value="">Seleccione una escuela</option>
                @foreach ($escuelas as $escuela)
                    <option value="{{ $escuela->id_escuela }}"
                        data-nombre="{{ strtolower($escuela->nombre_escuela) }}"
                        {{ old('escuela_id_escuela', $asignacion->escuela_id_escuela ?? '') == $escuela->id_escuela ? 'selected' : '' }}>
                        {{ $escuela->nombre_escuela }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buscar Sección -->
        <div class="mb-3">
            <label for="seccion_busqueda" class="form-label">Buscar Sección</label>
            <input type="text" class="form-control" id="seccion_busqueda" placeholder="Escriba para filtrar...">
        </div>
        <!-- Sección -->
        <div class="mb-3">
            <label for="seccion_id_seccion" class="form-label">Sección <span class="text-danger">*</span></label>
            <select name="seccion_id_seccion" id="seccion_id_seccion" class="form-select" required>
                <option value="">Seleccione una sección</option>
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->id_seccion }}"
                        data-letra="{{ strtolower($seccion->letra) }}"
                        {{ old('seccion_id_seccion', $asignacion->seccion_id_seccion ?? '') == $seccion->id_seccion ? 'selected' : '' }}>
                        {{ $seccion->letra }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buscar Grado -->
        <div class="mb-3">
            <label for="grado_busqueda" class="form-label">Buscar Grado</label>
            <input type="text" class="form-control" id="grado_busqueda" placeholder="Escriba para filtrar...">
        </div>
        <!-- Grado -->
        <div class="mb-3">
            <label for="grado_id_grado" class="form-label">Grado <span class="text-danger">*</span></label>
            <select name="grado_id_grado" id="grado_id_grado" class="form-select" required>
                <option value="">Seleccione un grado</option>
                @foreach ($grados as $grado)
                    <option value="{{ $grado->id_grado }}"
                        data-nombre="{{ strtolower($grado->nombre_grado) }}"
                        {{ old('grado_id_grado', $asignacion->grado_id_grado ?? '') == $grado->id_grado ? 'selected' : '' }}>
                        {{ $grado->nombre_grado }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buscar Catedrático -->
        <div class="mb-3">
            <label for="catedratico_busqueda" class="form-label">Buscar Catedrático</label>
            <input type="text" class="form-control" id="catedratico_busqueda" placeholder="Escriba para filtrar...">
        </div>
        <!-- Catedrático -->
        <div class="mb-3">
            <label for="catedratico_cui" class="form-label">Catedrático <span class="text-danger">*</span></label>
            <select name="catedratico_cui" id="catedratico_cui" class="form-select" required>
                <option value="">Seleccione un catedrático</option>
                @foreach ($catedraticos as $catedratico)
                    <option value="{{ $catedratico->cui }}"
                        data-nombre="{{ strtolower($catedratico->nombre_catedratico) }}"
                        {{ old('catedratico_cui', $asignacion->catedratico_cui ?? '') == $catedratico->cui ? 'selected' : '' }}>
                        {{ $catedratico->nombre_catedratico }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buscar Curso -->
        <div class="mb-3">
            <label for="curso_busqueda" class="form-label">Buscar Curso</label>
            <input type="text" class="form-control" id="curso_busqueda" placeholder="Escriba para filtrar...">
        </div>
        <!-- Curso -->
        <div class="mb-3">
            <label for="curso_id_curso" class="form-label">Curso <span class="text-danger">*</span></label>
            <select name="curso_id_curso" id="curso_id_curso" class="form-select" required>
                <option value="">Seleccione un curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id_curso }}"
                        data-nombre="{{ strtolower($curso->nombre_curso) }}"
                        {{ old('curso_id_curso', $asignacion->curso_id_curso ?? '') == $curso->id_curso ? 'selected' : '' }}>
                        {{ $curso->nombre_curso }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i>
                @isset($asignacion) Actualizar @else Guardar @endisset
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Función para filtrar opciones en select
    function filterSelect(inputId, selectId, dataAttributes) {
        document.getElementById(inputId).addEventListener('input', function () {
            const filtro = this.value.toLowerCase();
            const opciones = document.querySelectorAll(`#${selectId} option`);

            opciones.forEach((opcion, index) => {
                if(index === 0) return; // dejar opción por defecto visible

                // Verificar si alguna data-attribute contiene el texto filtrado
                const mostrar = dataAttributes.some(attr => {
                    const valor = opcion.getAttribute(attr);
                    return valor && valor.includes(filtro);
                });

                opcion.style.display = mostrar ? 'block' : 'none';
            });
        });
    }

    // Configurar filtros para cada select con sus respectivos data-attributes
    filterSelect('inscripcion_busqueda', 'inscripcion_codigo', ['data-codigo', 'data-alumno']);
    filterSelect('escuela_busqueda', 'escuela_id_escuela', ['data-nombre']);
    filterSelect('seccion_busqueda', 'seccion_id_seccion', ['data-letra']);
    filterSelect('grado_busqueda', 'grado_id_grado', ['data-nombre']);
    filterSelect('catedratico_busqueda', 'catedratico_cui', ['data-nombre']);
    filterSelect('curso_busqueda', 'curso_id_curso', ['data-nombre']);
</script>

</body>
</html>
