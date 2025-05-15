<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escuelas Registradas - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/vistasIndex.css') }}">

</head>
<body>

    <div class="container">
        <h1>Escuelas Registradas</h1>

        <div class="actions">
            <a href="{{ url('/') }}" class="back">Volver al Panel</a>
            <a href="{{ route('escuelas.create') }}">Agregar Escuela</a>
        </div>

        @if($escuelas->isEmpty())
            <div class="alert">
                No hay escuelas registradas aún.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Código</th>
                        <th>Zona</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($escuelas as $escuela)
                        <tr>
                            <td>{{ $escuela->id_escuela }}</td>
                            <td>{{ $escuela->nombre_escuela }}</td>
                            <td>{{ $escuela->direccion }}</td>
                            <td>{{ $escuela->codigo_establecimiento }}</td>
                            <td>{{ $escuela->zona }}</td>
                            <td>
                                <a href="{{ route('escuelas.show', $escuela) }}" class="btn-view">Ver</a>
                                <a href="{{ route('escuelas.edit', $escuela) }}" class="btn-edit">Editar</a>
                                <form action="{{ route('escuelas.destroy', $escuela) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta escuela?')">
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
