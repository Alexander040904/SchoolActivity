@if (auth()->user()->role_id == 2)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mis materias') }}
            </h2>
        </x-slot>

        @if (auth()->user()->is_active==1)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">

                            {{ __('Ya esta activado Papu') }}

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">

                            {{ __('Espere hasta que un administrador te active') }}
                            {{ auth()->user()->is_active }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </x-app-layout>
@else
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Alumnos ') }}
            </h2>
        </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ 'No hay nada' }}

                        </div>

                    @endif

                </div>


            </div>
        </div>
    </x-app-layout>

@endif
