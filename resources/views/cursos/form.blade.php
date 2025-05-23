<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($curso) Editar Curso @else Crear Curso @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/formularios.css') }}">
</head>
<body>
<div class="container">
    <h1>@isset($curso) Editar Curso @else Crear Curso @endisset</h1>

    <form method="POST" action="@isset($curso) {{ route('cursos.update', $curso) }} @else {{ route('cursos.store') }} @endisset">
        @csrf
        @isset($curso)
            @method('PUT')
        @endisset

        <input type="text" name="nombre_curso" value="{{ old('nombre_curso', $curso->nombre_curso ?? '') }}" placeholder="Nombre del Curso" required>

        <button type="submit">@isset($curso) Actualizar @else Crear @endisset</button>
    </form>

    <div class="actions">
        <a href="{{ route('cursos.index') }}">Volver al listado</a>
    </div>
</div>
</body>
</html>
