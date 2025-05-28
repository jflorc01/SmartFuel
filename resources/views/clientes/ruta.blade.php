@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="text-center pb-3">
        <h1 class="text-3xl font-semibold">Ruta Optimizada</h1>
    </div>

    <div class="mb-4">
        <h5 class="fw-semibold">Orden de reparto:</h5>
        <ol class="list-group list-group-numbered">
            @foreach ($clientesOrdenados as $cliente)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $cliente->nombre }}</div>
                        {{ $cliente->direccion }}
                        <small class="text-muted d-block">({{ $cliente->latitud }}, {{ $cliente->longitud }})</small>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>

    <div id="map" style="height: 500px;" class="rounded shadow-sm mb-4"></div>

    <div class="text-center">
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const base = [{{ $base[0] }}, {{ $base[1] }}];
        const map = L.map('map').setView(base, 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        // Marcador base
        L.marker(base).addTo(map).bindPopup("Base").openPopup();

        // Marcadores clientes
        @foreach ($clientesOrdenados as $cliente)
            L.marker([{{ $cliente->latitud }}, {{ $cliente->longitud }}])
             .addTo(map).bindPopup("{{ $cliente->nombre }}");
        @endforeach

        // Dibujar polyline optimizada
        const enc = @json($polyline);
        const coords = polyline.decode(enc);
        L.polyline(coords, { weight: 5, color: 'blue' }).addTo(map);
        map.fitBounds(L.latLngBounds(coords));
    });
</script>
@endsection
