@if (auth()->user()->role_id == 2)
    @section('nav-link')
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    @endsection
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mis materias') }}
            </h2>
        </x-slot>

        @if (auth()->user()->is_active == 1)
            <x-content-box>
                {{ __('Ya esta activado Papu') }}
            </x-content-box>
        @else
            <x-content-box>
                {{ __('Espere hasta que un administrador te active') }}
                {{ auth()->user()->is_active }}
            </x-content-box>
        @endif

    </x-app-layout>
@else
    @section('nav-link')
        <x-nav-link :href="route('activation', 1)" :active="request()->query('source') === '1'">
            {{ __('Activos') }}
        </x-nav-link>

        <x-nav-link :href="route('activation', 2)" :active="request()->query('source') === '2'">
            {{ __('Inactivos') }}
        </x-nav-link>
    @endsection
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Alumnos ') }}
            </h2>
        </x-slot>

        <x-content-box>
            @if (session('activeUsers') && count(session('activeUsers')) > 0)

                @foreach (session('activeUsers') as $user)
                    <!-- Mostrar propiedades de cada usuario en 'activeUsers' -->

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <!-- Nombre del usuario -->
                            <div>
                                {{ $user->name }}
                            </div>
                            <!-- Botón -->
                            <div>
                                @if (request()->query('source') === '1')
                                    <form action="{{ route('deactivate', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-danger-button>
                                            Desactivar
                                        </x-danger-button>


                                    </form>
                                @else
                                    <form action="{{ route('activate', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- Esto indica que la solicitud debe ser de tipo PUT -->
                                        <x-danger-button>
                                            Activar
                                        </x-danger-button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{ 'No hay nada' }}


            @endif
        </x-content-box>




    </x-app-layout>

@endif
