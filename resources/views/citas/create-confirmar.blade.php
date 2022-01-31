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
                        <h1>Confirmar la cita</h1>
                        <div>
                            <form action="{{ route('store-cita-confirmar', [$compania, $cita]) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 mt-4 m-2 rounded bg-green-300">
                                    Confirmar
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('crear-cita-fecha-hora', [$compania, $cita->especialista->especialidad, $cita->especialista]) }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
