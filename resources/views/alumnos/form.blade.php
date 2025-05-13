<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($alumno) Editar Alumno @else Crear Alumno @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">
</head>
<body>

    <div class="container">
        <h1>@isset($alumno) Editar Alumno @else Crear Alumno @endisset</h1>

        <form method="POST" action="@isset($alumno) {{ route('alumnos.update', $alumno) }} @else {{ route('alumnos.store') }} @endisset">
            @csrf
            @isset($alumno)
                @method('PUT')
            @endisset

            <input type="text" name="cui" value="{{ old('cui', $alumno->cui ?? '') }}" placeholder="CUI" required>
            <input type="text" name="nombre_alumno" value="{{ old('nombre_alumno', $alumno->nombre_alumno ?? '') }}" placeholder="Nombre del Alumno" required>
            <input type="number" name="edad" value="{{ old('edad', $alumno->edad ?? '') }}" placeholder="Edad" required>
            <input type="text" name="sexo" value="{{ old('sexo', $alumno->sexo ?? '') }}" placeholder="Sexo (M/F)" required>

            <select name="inscripcion_codigo" required>
                <option value="">Seleccione una inscripción</option>
                @foreach($inscripciones as $inscripcion)
                    <option value="{{ $inscripcion->codigo }}"
                        {{ old('inscripcion_codigo', $alumno->inscripcion_codigo ?? '') == $inscripcion->codigo ? 'selected' : '' }}>
                        {{ $inscripcion->codigo }} - {{ $inscripcion->fecha }}
                    </option>
                @endforeach
            </select>

            <button type="submit">@isset($alumno) Actualizar @else Crear @endisset</button>
        </form>

        <div class="actions">
            <a href="{{ route('alumnos.index') }}">Volver al listado</a>
        </div>
    </div>

</body>
</html>
