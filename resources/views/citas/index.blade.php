<x-contenido>
    <x-slot name="cabecera">
        Mis citas
    </x-slot>
    @if ($citas->isNotEmpty())
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Fecha y hora
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Paciente
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Compañía
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($citas as $cita)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $cita->fecha_hora->locale('es_ES')->timezone('Europe/Madrid')->isoFormat('DD-MM-YYYY HH:mm') }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $cita->user->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $cita->compania->denominacion }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="bg-green-100 rounded-lg p-4 mt-4 mb-4 text-sm text-green-700 w-96 text-center" role="alert">
                No hay citas.
            </div>
        </div>
    @endif
    <a href="{{ route('dashboard-especialista') }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
</x-contenido>
