@if($tutelares->isEmpty())
    <div class="alert alert-info">No hay tutores asignados aún.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>CUI Alumno</th>
                    <th>Nombre Alumno</th>
                    <th>CUI Tutor</th>
                    <th>Nombre Tutor</th>
                    <th>Teléfono</th>
                    <th class="text-center" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody id="tutelaresTableBody">
                @foreach($tutelares as $tutelar)
                    <tr>
                        <td><strong>{{ $tutelar->cui_alumno }}</strong></td>
                        <td>{{ $tutelar->alumno->nombre_alumno ?? 'N/A' }}</td>
                        <td>{{ $tutelar->cui_tutor }}</td>
                        <td>{{ $tutelar->nombre_tutor }}</td>
                        <td>{{ $tutelar->telefono ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('tutelares.show', ['cui_alumno' => $tutelar->cui_alumno, 'cui_tutor' => $tutelar->cui_tutor]) }}"
                               class="btn btn-sm btn-outline-info me-1" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('tutelares.edit', ['cui_alumno' => $tutelar->cui_alumno, 'cui_tutor' => $tutelar->cui_tutor]) }}"
                               class="btn btn-sm btn-outline-warning me-1" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('tutelares.destroy', ['cui_alumno' => $tutelar->cui_alumno, 'cui_tutor' => $tutelar->cui_tutor]) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar este tutor asignado?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
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
        {{ $tutelares->links('pagination::bootstrap-5') }}
    </nav>
@endif
