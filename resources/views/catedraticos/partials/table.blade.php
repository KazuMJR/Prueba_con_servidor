@if($catedraticos->isEmpty())
    <div class="alert alert-info">No hay catedráticos registrados aún.</div>
@else
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>CUI</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th class="text-center" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody id="catedraticosTableBody">
                @foreach($catedraticos as $catedratico)
                    <tr>
                        <td><strong>{{ $catedratico->cui }}</strong></td>
                        <td>{{ $catedratico->nombre_catedratico }}</td>
                        <td>{{ $catedratico->edad }}</td>
                        <td>{{ $catedratico->sexo }}</td>
                        <td class="text-center">
                            <a href="{{ route('catedraticos.show', ['catedratico' => $catedratico->cui, 'busqueda' => $busqueda]) }}"
                               class="btn btn-sm btn-outline-info me-1">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('catedraticos.edit', ['catedratico' => $catedratico->cui, 'busqueda' => $busqueda]) }}"
                               class="btn btn-sm btn-outline-warning me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('catedraticos.destroy', ['catedratico' => $catedratico->cui, 'busqueda' => $busqueda]) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar este catedrático?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
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
        {{ $catedraticos->links('pagination::bootstrap-5') }}
    </nav>
@endif
