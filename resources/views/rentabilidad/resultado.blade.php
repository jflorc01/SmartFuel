@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pb-4 text-center">
        <h1 class="text-3xl font-semibold">Resultado del cálculo</h1>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Datos del reparto</h5>
            <p><strong>Camion:</strong> {{ $camion->marca }} {{ $camion->modelo }} ({{ $camion->matricula }})</p>
            <p><strong>Kilómetros:</strong> {{ $kilometros }} km</p>
            <p><strong>Importe del pedido:</strong> {{ number_format($importe_pedido, 2) }} €</p>
            <p><strong>Coste total:</strong> {{ number_format($costeTotal, 2) }} €</p>
            
            <h4 class="mt-4">
                Rentabilidad: 
                <span class="{{ $esRentable ? 'text-success' : 'text-danger' }}">
                    {{ number_format($rentabilidad, 2) }} €
                    ({{ $esRentable ? 'Rentable' : 'No rentable' }})
                </span>
            </h4>
            
            <a href="{{ route('rentabilidad.formulario') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</div>
@endsection