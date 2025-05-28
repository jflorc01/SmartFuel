@extends('layouts.app')

@section('content')
<div class="pb-4 text-center">
    <h1 class="text-3xl font-semibold">Lista de clientes</h1>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('clientes.create') }}" class="btn btn-outline-success btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Añadir nuevo cliente
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('clientes.calcularRuta') }}" method="POST">
            @csrf

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">
                                
                            </th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>
                                    <input type="checkbox" name="clientes[]" value="{{ $cliente->id }}" class="cliente-checkbox">
                                </td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td class="text-center">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('clientes.edit', $cliente) }}"
                                    class="btn btn-sm btn-outline-primary me-1"
                                    title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('clientes.confirm-delete', $cliente) }}"
                                       class="btn btn-sm btn-outline-danger"
                                       title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No hay clientes disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button 
                    type="submit" 
                    class="btn btn-success" 
                    id="btnCalcularRuta"
                    @if($clientes->isEmpty())
                        disabled
                    @endif
                >
                    Calcular ruta
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
