<x-create-citas>
    <h1>Seleccione el especialista</h1>
    @foreach ($especialistas as $especialista)
    <a class="px-4 m-2 rounded bg-gray-300" href="{{ route('crear-cita-fecha-hora', [$compania, $especialidad, $especialista]) }}">
        {{ $especialista->nombre }}
    </a>
    @endforeach
    <a href="{{ route('crear-cita-especialidad', $compania, $especialidad) }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
</x-create-citas>
