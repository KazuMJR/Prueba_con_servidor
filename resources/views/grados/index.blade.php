<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Grados Registrados - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/vistasIndex.css') }}">

</head>
<body>

<div class="container">
    <h1>Grados Registrados</h1>

    <div class="actions">
        <a href="{{ url('/') }}" class="back">Volver al Panel</a>
        <a href="{{ route('grados.create') }}">Agregar Grado</a>
    </div>

    @if($grados->isEmpty())
        <div class="alert">No hay grados registrados aún.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nivel Educativo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grados as $grado)
                    <tr>
                        <td>{{ $grado->id_grado }}</td>
                        <td>{{ $grado->nombre_grado }}</td>
                        <td>{{ $grado->nivel_educativo }}</td>
                        <td>
                            <a href="{{ route('grados.show', $grado) }}" class="btn-view">Ver</a>
                            <a href="{{ route('grados.edit', $grado) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('grados.destroy', $grado) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este grado?')">
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
