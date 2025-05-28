@extends('layouts.app')

@section('content')
    <div class="text-center mb-12">
        @auth
            <h1 class="text-3xl font-semibold">¡Hola, {{ Auth::user()->name }}!</h1>
            <p class="mt-2 text-gray-600">¿Qué quieres hacer hoy?</p>
        @else
            <h1 class="text-3xl font-semibold">Bienvenido a SmartFuel</h1>
            <p class="mt-2 text-gray-600">Gestiona repartos de gasoil: calcula rentabilidad y optimiza rutas.</p>
        @endauth
    </div>

    @guest
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Iniciar sesión
            </a>
            <a href="{{ route('register') }}"
               class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                Registrarse
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Calculadora de rentabilidad -->
            <a href="{{ route('rentabilidad.formulario') }}"
               class="block p-6 bg-white rounded-2xl shadow hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-4">
                   <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600 lucide lucide-calculator-icon lucide-calculator">
                        <rect width="16" height="20" x="4" y="2" rx="2"/>
                        <line x1="8" x2="16" y1="6" y2="6"/>
                        <line x1="16" x2="16" y1="14" y2="18"/>
                        <path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/>
                        <path d="M12 18h.01"/><path d="M8 18h.01"/>
                    </svg>

                </div>
                <h2 class="text-xl font-medium mb-1">Cálculo de rentabilidad</h2>
                <p class="text-gray-500">Introduce distancia e importe para saber al instante si el reparto sale rentable.</p>
            </a>

            <!-- Optimización de rutas -->
            <a href="{{ route('clientes.index') }}"
               class="block p-6 bg-white rounded-2xl shadow hover:shadow-lg transition">
                <div class="flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600 lucide lucide-map-icon lucide-map">
                        <path d="M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z"/>
                        <path d="M15 5.764v15"/><path d="M9 3.236v15"/>
                    </svg>
                </div>
                <h2 class="text-xl font-medium mb-1">Optimización de rutas</h2>
                <p class="text-gray-500">Selecciona destinos y obtén la ruta más eficiente con un solo clic.</p>
            </a>
        </div>
    @endguest
@endsection
