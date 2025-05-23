<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cursos Registrados - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('styles/vistasIndex.css') }}">

</head>
<body>
<div class="container">
    <h1>Cursos Registrados</h1>

    <div class="actions">
        <a href="{{ url('/') }}" class="back">Volver al Panel</a>
        <a href="{{ route('cursos.create') }}">Agregar Curso</a>
    </div>

    @if($cursos->isEmpty())
        <div class="alert">No hay cursos registrados aún.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id_curso }}</td>
                        <td>{{ $curso->nombre_curso }}</td>
                        <td>
                            <a href="{{ route('cursos.show', $curso) }}" class="btn-view">Ver</a>
                            <a href="{{ route('cursos.edit', $curso) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este curso?')">
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
