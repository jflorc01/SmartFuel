<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        
        <!-- Page Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
    <footer class="bg-gradient-to-r from-green-600 to-emerald-600 shadow-lg mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between space-y-8 md:space-y-0">
                <div class="flex-1 max-w-xs">
                    <div class="flex items-center">
                        <x-application-logo class="block h-8 w-auto fill-current text-green-300" />
                        <span class="ml-2 text-white font-bold text-xl">SmartFuel</span>
                    </div>
                    <p class="mt-4 text-emerald-100 text-sm">
                        Herramienta interna para gestión logística y análisis de rentabilidad.
                    </p>
                </div>

                @auth
                    <div class="flex-1 md:text-center">
                        <h3 class="text-white font-semibold mb-4">Acceso Rápido</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('rentabilidad.formulario') }}" class="text-emerald-100 hover:text-white transition-colors text-sm">
                                    Cálculo de Rentabilidad
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('clientes.index') }}" class="text-emerald-100 hover:text-white transition-colors text-sm">
                                    Optimización de Rutas
                                </a>
                            </li>
                        </ul>
                    </div>
                @endauth

                <div class="flex-1 md:text-right">
                    <h3 class="text-white font-semibold mb-4">Contacto</h3>
                    <div class="space-y-2">
                        <p class="text-emerald-100 text-sm">
                            Av. el Romeral, 125<br>
                            Villabalter, León
                        </p>
                        <p class="text-emerald-100 text-sm">
                            Tel: <a href="tel:+34987846315">987 84 63 15</a>
                        </p>
                        <p class="text-emerald-100 text-sm">
                            <a href="mailto:juanalvaro@protonmail.com">juanalvaro@protonmail.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="border-t border-emerald-500 mt-8 pt-6 text-center">
                <p class="text-xs text-emerald-200">
                    &copy; {{ date('Y') }} Juan Álvaro Flórez Carrio. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <!-- Leafleet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Mapbox Polyline (para decodificar los polylines de Google) -->
    <script src="https://unpkg.com/@mapbox/polyline@1.1.1/src/polyline.js"></script>
    @yield('scripts')
</body>
</html>