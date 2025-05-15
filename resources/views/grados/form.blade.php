<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($grado) Editar Grado @else Crear Grado @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">
</head>
<body>

<div class="container">
    <h1>@isset($grado) Editar Grado @else Crear Grado @endisset</h1>

    <form method="POST" action="@isset($grado) {{ route('grados.update', $grado) }} @else {{ route('grados.store') }} @endisset">
        @csrf
        @isset($grado)
            @method('PUT')
        @endisset

        <input type="text" name="nombre_grado" value="{{ old('nombre_grado', $grado->nombre_grado ?? '') }}" placeholder="Nombre del Grado" required>
        <input type="text" name="nivel_educativo" value="{{ old('nivel_educativo', $grado->nivel_educativo ?? '') }}" placeholder="Nivel Educativo" required>

        <button type="submit">@isset($grado) Actualizar @else Crear @endisset</button>
    </form>

    <div class="actions">
        <a href="{{ route('grados.index') }}">Volver al listado</a>
    </div>
</div>

</body>
</html>
