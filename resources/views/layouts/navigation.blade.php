<nav x-data="{ open: false }" class="bg-gradient-to-r from-green-600 to-emerald-600 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="flex items-center">
                        <x-application-logo class="block h-9 w-auto fill-current text-green-300" />
                        <span class="ml-2 text-white font-bold text-xl">SmartFuel</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-green-500 px-3 py-2 rounded-md transition-colors">
                        {{ __('Dashboard') }}
                    </x-nav-link> -->
                    @auth
                        <x-nav-link :href="route('rentabilidad.formulario')" :active="request()->routeIs('rentabilidad.formulario')" class="text-white hover:bg-green-500 px-3 py-2 rounded-md transition-colors">
                            {{ __('Cálculo de rentabilidad') }}
                        </x-nav-link>
                        <x-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')" class="text-white hover:bg-green-500 px-3 py-2 rounded-md transition-colors">
                            {{ __('Optimización de rutas') }}
                        </x-nav-link>
                    @endauth
                    @guest
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-white hover:bg-green-500 px-3 py-2 rounded-md transition-colors">
                            {{ __('Iniciar sesión') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-white hover:bg-green-500 px-3 py-2 rounded-md transition-colors">
                            {{ __('Registrarse') }}
                        </x-nav-link>
                    @endguest
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-white hover:text-emerald-200 transition-colors">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        
                        <x-slot name="content">
                            <x-dropdown-link :href="route('usuario.cambiar-base')" class="text-red-600 hover:bg-red-50">
                                {{ __('Cambiar base') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-red-600 hover:bg-red-50"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>


            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-green-500 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @auth
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-green-600">
            <div class="pt-2 pb-3 space-y-1">
                <!-- <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-green-500">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link> -->
                <x-responsive-nav-link :href="route('rentabilidad.formulario')" :active="request()->routeIs('rentabilidad.formulario')" class="text-white hover:bg-green-500">
                    {{ __('Cálculo de rentabilidad') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')" class="text-white hover:bg-green-500">
                    {{ __('Optimización de rutas') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-emerald-500">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-emerald-200">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-green-500">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link> -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" class="text-red-200 hover:bg-red-500/20"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>