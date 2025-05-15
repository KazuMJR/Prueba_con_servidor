<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($seccion) ? 'Editar Sección' : 'Crear Sección' }}</title>
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">
</head>
<body>
<div class="container">
    <h1>{{ isset($seccion) ? 'Editar Sección' : 'Crear Sección' }}</h1>

    <form method="POST" action="{{ isset($seccion) ? route('secciones.update', $seccion) : route('secciones.store') }}">
        @csrf
        @if(isset($seccion))
            @method('PUT')
        @endif

        <label for="letra">Letra:</label>
        <input type="text" name="letra" id="letra" value="{{ old('letra', $seccion->letra ?? '') }}" required maxlength="1">

        <button type="submit">{{ isset($seccion) ? 'Actualizar' : 'Crear' }}</button>
    </form>

    <div class="actions">
        <a href="{{ route('secciones.index') }}">Volver al listado</a>
    </div>
</div>
</body>
</html>
