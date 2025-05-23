<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Secciones Registradas - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/vistasIndex.css') }}">

</head>
<body>

<div class="container">
    <h1>Secciones Registradas</h1>

    <div class="actions">
        <a href="{{ url('/') }}" class="back">Volver al Panel</a>
        <a href="{{ route('secciones.create') }}">Agregar Sección</a>
    </div>

    @if($secciones->isEmpty())
        <div class="alert">No hay secciones registradas aún.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Letra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($secciones as $seccion)
                    <tr>
                        <td>{{ $seccion->id_seccion }}</td>
                        <td>{{ $seccion->letra }}</td>
                        <td>
                            <a href="{{ route('secciones.show', $seccion) }}" class="btn-view">Ver</a>
                            <a href="{{ route('secciones.edit', $seccion) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('secciones.destroy', $seccion) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta sección?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>
