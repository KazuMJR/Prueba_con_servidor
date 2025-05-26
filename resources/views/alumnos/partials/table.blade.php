@if($alumnos->isEmpty())
    <div class="alert alert-info">No hay alumnos registrados aún.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>CUI</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody id="alumnosTableBody">
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->cui }}</td>
                        <td>{{ $alumno->nombre_alumno }}</td>
                        <td>{{ $alumno->edad }}</td>
                        <td>{{ $alumno->sexo }}</td>
                        <td>
                            <a href="{{ route('alumnos.show', ['alumno' => $alumno->cui, 'busqueda' => $busqueda]) }}" class="btn btn-sm btn-info me-1">Ver</a>
                            <a href="{{ route('alumnos.edit', ['alumno' => $alumno->cui, 'busqueda' => $busqueda]) }}" class="btn btn-sm btn-warning me-1">Editar</a>
                            <form action="{{ route('alumnos.destroy', ['alumno' => $alumno->cui, 'busqueda' => $busqueda]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este alumno?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <nav id="paginacionContenedor">
        {{ $alumnos->links('pagination::bootstrap-5') }}
    </nav>
@endif
