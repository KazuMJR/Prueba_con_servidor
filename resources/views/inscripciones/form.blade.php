<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($inscripcion) Editar Inscripción @else Crear Inscripción @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">
</head>
<body>

    <div class="container">
        <h1>@isset($inscripcion) Editar Inscripción @else Crear Inscripción @endisset</h1>

        <form method="POST" action="@isset($inscripcion) {{ route('inscripciones.update', $inscripcion) }} @else {{ route('inscripciones.store') }} @endisset">
            @csrf
            @isset($inscripcion)
                @method('PUT')
            @endisset

            <input type="text" name="codigo" value="{{ old('codigo', $inscripcion->codigo ?? '') }}" placeholder="Código de Inscripción" required>
            <input type="date" name="fecha" value="{{ old('fecha', $inscripcion->fecha ?? '') }}" placeholder="Fecha" required>

            <label for="cui">Alumno</label>
            <select name="cui" required>
                <option value="">Seleccionar Alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->cui }}" @if(old('cui', $inscripcion->alumno->cui ?? '') == $alumno->cui) selected @endif>
                        {{ $alumno->nombre_alumno }}
                    </option>
                @endforeach
            </select>

            <button type="submit">@isset($inscripcion) Actualizar @else Crear @endisset Inscripción</button>
        </form>

        <div class="actions">
            <a href="{{ route('inscripciones.index') }}">Volver al listado</a>
        </div>
    </div>

</body>
</html>
