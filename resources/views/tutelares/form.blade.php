<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($tutelar) ? 'Editar Tutor' : 'Agregar Tutor' }} - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">{{ isset($tutelar) ? 'Editar Tutor' : 'Agregar Tutor' }}</h1>

    <a href="{{ route('tutelares.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($tutelar))
        <form action="{{ route('tutelares.update', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" method="POST">
            @method('PUT')
            @else
                <form action="{{ route('tutelares.store') }}" method="POST">
                    @endif
                    @csrf

                    <div class="mb-3">
                        <label for="cui_alumno" class="form-label">Alumno</label>
                        @if(isset($tutelar))
                            <input type="text" class="form-control" value="{{ $tutelar->cui_alumno }}" disabled>
                            <input type="hidden" name="cui_alumno" value="{{ $tutelar->cui_alumno }}">
                        @else
                            <select name="cui_alumno" id="cui_alumno" class="form-select" required>
                                <option value="">-- Seleccione un alumno --</option>
                                @foreach($alumnos as $alumno)
                                    <option value="{{ $alumno->cui }}" {{ old('cui_alumno') == $alumno->cui ? 'selected' : '' }}>
                                        {{ $alumno->nombre_alumno }} ({{ $alumno->cui }})
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="cui_tutor" class="form-label">CUI Tutor</label>
                        <input type="text" name="cui_tutor" id="cui_tutor" class="form-control"
                               value="{{ old('cui_tutor', $tutelar->cui_tutor ?? '') }}" {{ isset($tutelar) ? 'readonly' : 'required' }}>
                    </div>

                    <div class="mb-3">
                        <label for="nombre_tutor" class="form-label">Nombre Tutor</label>
                        <input type="text" name="nombre_tutor" id="nombre_tutor" class="form-control"
                               value="{{ old('nombre_tutor', $tutelar->nombre_tutor ?? '') }}" required maxlength="60">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control"
                               value="{{ old('telefono', $tutelar->telefono ?? '') }}" maxlength="15">
                    </div>

                    <button type="submit" class="btn btn-success">{{ isset($tutelar) ? 'Actualizar' : 'Guardar' }}</button>
                </form>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
