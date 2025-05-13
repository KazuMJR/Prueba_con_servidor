<!-- resources/views/escuelas/form.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($escuela) Editar Escuela @else Crear Escuela @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/formularios.css') }}">

</head>
<body>

    <div class="container">
        <h1>@isset($escuela) Editar Escuela @else Crear Escuela @endisset</h1>

        <form method="POST" action="@isset($escuela) {{ route('escuelas.update', $escuela) }} @else {{ route('escuelas.store') }} @endisset">
            @csrf
            @isset($escuela)
                @method('PUT')
            @endisset

            <input type="text" name="nombre_escuela" value="{{ old('nombre_escuela', $escuela->nombre_escuela ?? '') }}" placeholder="Nombre de la Escuela" required>
            <input type="text" name="direccion" value="{{ old('direccion', $escuela->direccion ?? '') }}" placeholder="Dirección" required>
            <input type="text" name="codigo_establecimiento" value="{{ old('codigo_establecimiento', $escuela->codigo_establecimiento ?? '') }}" placeholder="Código Establecimiento" required>
            <input type="text" name="zona" value="{{ old('zona', $escuela->zona ?? '') }}" placeholder="Zona" required>
            
            <button type="submit">@isset($escuela) Actualizar @else Crear @endisset</button>
        </form>

        <div class="actions">
            <a href="{{ route('escuelas.index') }}">Volver al listado</a>
        </div>
    </div>

</
