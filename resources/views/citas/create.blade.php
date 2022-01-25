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
                        <h1>Seleccione la compañía aseguradora</h1>
                        @foreach ($companias as $compania)
                            @php
                                if ($companias_usuario->contains($compania)) {
                                    $class = 'bg-green-300';
                                } else {
                                    $class = 'bg-gray-300';
                                }
                            @endphp
                            <a class="px-4 m-2 rounded {{ $class }}" href="{{ route('crear-cita-especialidad', $compania) }}">
                                {{ $compania->denominacion }}
                            </a>
                        @endforeach
                        <a href="{{ route('dashboard') }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
