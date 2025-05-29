@if($inscripciones->isEmpty())
    <div class="alert alert-info">No hay inscripciones registradas aún.</div>
@else
    <div class="table-responsive">
        <table class="table align-middle table-hover border">
            <thead class="table-light">
                <tr>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Alumno</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="inscripcionesTableBody">
                @foreach($inscripciones as $inscripcion)
                    <tr>
                        <td><strong>{{ $inscripcion->codigo }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($inscripcion->fecha)->format('d/m/Y') }}</td>
                        <td>{{ $inscripcion->alumno->nombre_alumno ?? 'No asignado' }}</td>
                        <td class="text-center">
                            <a href="{{ route('inscripciones.show', ['inscripcione' => $inscripcion->codigo, 'busqueda' => request('busqueda')]) }}"
                               class="btn btn-outline-info btn-sm me-1" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('inscripciones.edit', ['inscripcione' => $inscripcion->codigo, 'busqueda' => request('busqueda')]) }}"
                               class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('inscripciones.destroy', ['inscripcione' => $inscripcion->codigo, 'busqueda' => request('busqueda')]) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Estás seguro de eliminar esta inscripción?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <nav id="paginacionContenedor">
        {{ $inscripciones->links('pagination::bootstrap-5') }}
    </nav>
@endif
