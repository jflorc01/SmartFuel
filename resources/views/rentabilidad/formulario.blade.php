@extends('layouts.app')

@section('content')
<div class="pb-4 text-center">
    <h1 class="text-3xl font-semibold">Cálculo de Rentabilidad de Reparto</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('rentabilidad.calcular') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="kilometros" class="form-label">Kilómetros del reparto</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="kilometros" name="kilometros" placeholder="Ej. 45.5" required>
                    </div>

                    <div class="mb-3">
                        <label for="importe_pedido" class="form-label">Importe del pedido (€)</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="importe_pedido" name="importe_pedido" placeholder="Ej. 150.00" required>
                    </div>

                    <div class="mb-3">
                        <label for="camion_id" class="form-label">Seleccione camión</label>
                        <select class="form-select" id="camion_id" name="camion_id" required>
                            <option value="">-- Seleccione --</option>
                            @foreach($camiones as $camion)
                                <option value="{{ $camion->id }}">
                                    {{ $camion->marca }} {{ $camion->modelo }} ({{ $camion->matricula }}) - {{ number_format($camion->gastoPorKm, 2) }} €/km
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('camiones.create') }}" class="btn btn-outline-success">
                            + Añadir Camión
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Calcular Rentabilidad
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
