<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($asignacion) ? 'Editar' : 'Nueva' }} Asignación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">{{ isset($asignacion) ? 'Editar' : 'Nueva' }} Asignación</h1>

    <form method="POST" action="{{ isset($asignacion) ? route('asignaciones.update', $asignacion->id_asignacion) : route('asignaciones.store') }}">
        @csrf
        @if(isset($asignacion))
            @method('PUT')
        @endif

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
            <label for="inscripcion_codigo" class="form-label">Código de Inscripción</label>
            <select name="inscripcion_codigo" id="inscripcion_codigo" class="form-control" required>
                <option value="">Seleccione una inscripción</option>
                @foreach($inscripciones as $inscripcion)
                    <option value="{{ $inscripcion->codigo }}" {{ old('inscripcion_codigo', $asignacion->inscripcion_codigo ?? '') == $inscripcion->codigo ? 'selected' : '' }}>
                        {{ $inscripcion->codigo }} - {{ $inscripcion->alumno->nombre_alumno ?? 'Alumno no asignado' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="escuela_id_escuela" class="form-label">Escuela</label>
            <select name="escuela_id_escuela" id="escuela_id_escuela" class="form-control" required>
                <option value="">Seleccione una escuela</option>
                @foreach($escuelas as $escuela)
                    <option value="{{ $escuela->id_escuela }}" {{ old('escuela_id_escuela', $asignacion->escuela_id_escuela ?? '') == $escuela->id_escuela ? 'selected' : '' }}>
                        {{ $escuela->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="seccion_id_seccion" class="form-label">Sección</label>
            <select name="seccion_id_seccion" id="seccion_id_seccion" class="form-control" required>
                <option value="">Seleccione una sección</option>
                @foreach($secciones as $seccion)
                    <option value="{{ $seccion->id_seccion }}" {{ old('seccion_id_seccion', $asignacion->seccion_id_seccion ?? '') == $seccion->id_seccion ? 'selected' : '' }}>
                        {{ $seccion->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="grado_id_grado" class="form-label">Grado</label>
            <select name="grado_id_grado" id="grado_id_grado" class="form-control" required>
                <option value="">Seleccione un grado</option>
                @foreach($grados as $grado)
                    <option value="{{ $grado->id_grado }}" {{ old('grado_id_grado', $asignacion->grado_id_grado ?? '') == $grado->id_grado ? 'selected' : '' }}>
                        {{ $grado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="catedratico_cui" class="form-label">Catedrático</label>
            <select name="catedratico_cui" id="catedratico_cui" class="form-control" required>
                <option value="">Seleccione un catedrático</option>
                @foreach($catedraticos as $catedratico)
                    <option value="{{ $catedratico->cui }}" {{ old('catedratico_cui', $asignacion->catedratico_cui ?? '') == $catedratico->cui ? 'selected' : '' }}>
                        {{ $catedratico->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="curso_id_curso" class="form-label">Curso</label>
            <select name="curso_id_curso" id="curso_id_curso" class="form-control" required>
                <option value="">Seleccione un curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id_curso }}" {{ old('curso_id_curso', $asignacion->curso_id_curso ?? '') == $curso->id_curso ? 'selected' : '' }}>
                        {{ $curso->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">{{ isset($asignacion) ? 'Actualizar' : 'Guardar' }}</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
