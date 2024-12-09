@if (auth()->user()->role_id == 2)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mis materias') }}
            </h2>
        </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Espere hasta que un administrador te active') }}
                    </div>
                </div>
            </div>
        </div>
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
                                {{ $user->name }}

                            </div>
                        @endforeach
                    @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ 'No hay nada'}}

                    </div>

                    @endif




                </div>
            </div>
        </div>
    </x-app-layout>

@endif
