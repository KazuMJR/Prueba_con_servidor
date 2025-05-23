<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catedráticos Registrados - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/vistasIndex.css') }}">

</head>
<body>

<div class="container">
    <h1>Catedráticos Registrados</h1>

    <div class="actions">
        <a href="{{ url('/') }}" class="back">Volver al Panel</a>
        <a href="{{ route('catedraticos.create') }}">Agregar Catedrático</a>
    </div>

    @if($catedraticos->isEmpty())
        <div class="alert">
            No hay catedráticos registrados aún.
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>CUI</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($catedraticos as $catedratico)
                    <tr>
                        <td>{{ $catedratico->cui }}</td>
                        <td>{{ $catedratico->nombre_catedratico }}</td>
                        <td>{{ $catedratico->edad }}</td>
                        <td>{{ $catedratico->sexo }}</td>
                        <td>
                            <a href="{{ route('catedraticos.show', $catedratico) }}" class="btn-view">Ver</a>
                            <a href="{{ route('catedraticos.edit', $catedratico) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('catedraticos.destroy', $catedratico) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este catedrático?')">
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
