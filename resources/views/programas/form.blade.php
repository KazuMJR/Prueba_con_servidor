{{-- resources/views/programas/form.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($programa) ? 'Editar' : 'Crear' }} Programa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">
</head>
<body>

<div class="container">
    <h1>{{ isset($programa) ? 'Editar' : 'Crear' }} Programa</h1>

    <form method="POST" action="{{ isset($programa) ? route('programas.update', $programa) : route('programas.store') }}">
        @csrf
        @isset($programa)
            @method('PUT')
        @endisset

        <select name="grado_id_grado" required>
            <option value="">Seleccione el Grado</option>
            @foreach($grados as $grado)
                <option value="{{ $grado->id_grado }}"
                    {{ old('grado_id_grado', $programa->grado_id_grado ?? '') == $grado->id_grado ? 'selected' : '' }}>
                    {{ $grado->nombre_grado }}
                </option>
            @endforeach
        </select>

        <select name="curso_id_curso" required>
            <option value="">Seleccione el Curso</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id_curso }}"
                    {{ old('curso_id_curso', $programa->curso_id_curso ?? '') == $curso->id_curso ? 'selected' : '' }}>
                    {{ $curso->nombre_curso }}
                </option>
            @endforeach
        </select>

        <button type="submit">{{ isset($programa) ? 'Actualizar' : 'Crear' }} Programa</button>
    </form>

    <div class="actions">
        <a href="{{ route('programas.index') }}">Volver al listado</a>
    </div>
</div>

</body>
</html>
