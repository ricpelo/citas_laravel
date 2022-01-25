<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva cita
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="flex flex-col items-center mt-4">
                        <h1>Seleccione el día y la hora</h1>
                        @foreach ($citas as $cita)
                            <a class="px-4 m-2 rounded bg-gray-300" href="#">
                                {{ $cita->fecha_hora }}
                            </a>
                        @endforeach
                        <a href="{{ route('crear-cita-especialidad', $compania, $especialidad) }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
