<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($catedratico) Editar Catedrático @else Crear Catedrático @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">
</head>
<body>

<div class="container">
    <h1>@isset($catedratico) Editar Catedrático @else Crear Catedrático @endisset</h1>

    <form method="POST" action="@isset($catedratico) {{ route('catedraticos.update', $catedratico) }} @else {{ route('catedraticos.store') }} @endisset">
        @csrf
        @isset($catedratico)
            @method('PUT')
        @endisset

        <input type="text" name="cui" value="{{ old('cui', $catedratico->cui ?? '') }}" placeholder="CUI" @isset($catedratico) readonly @endisset required>
        <input type="text" name="nombre_catedratico" value="{{ old('nombre_catedratico', $catedratico->nombre_catedratico ?? '') }}" placeholder="Nombre del Catedrático" required>
        <input type="number" name="edad" value="{{ old('edad', $catedratico->edad ?? '') }}" placeholder="Edad" required>
        <select name="sexo" required>
            <option value="">Seleccione Sexo</option>
            <option value="M" @if(old('sexo', $catedratico->sexo ?? '') == 'M') selected @endif>Masculino</option>
            <option value="F" @if(old('sexo', $catedratico->sexo ?? '') == 'F') selected @endif>Femenino</option>
        </select>

        <button type="submit">@isset($catedratico) Actualizar @else Crear @endisset</button>
    </form>

    <div class="actions">
        <a href="{{ route('catedraticos.index') }}">Volver al listado</a>
    </div>
</div>

</body>
</html>
