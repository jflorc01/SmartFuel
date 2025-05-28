@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto text-center py-12">
    <h1 class="text-2xl font-semibold mb-6">¿Eliminar cliente?</h1>
    <p class="mb-6">Estás a punto de eliminar al cliente <strong>{{ $cliente->nombre }}</strong>. <br>Esta acción es irreversible.</p>

    <form action="{{ route('clientes.delete', $cliente) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2">
            <i class="bi bi-trash me-1"></i> Sí, eliminar
        </button>
    </form>

    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</div>
@endsection
