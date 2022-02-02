<x-create-citas>
    <h1>Seleccione la especialidad</h1>
    @foreach ($especialidades as $especialidad)
        <a class="px-4 m-2 rounded bg-gray-300" href="{{ route('crear-cita-especialista', [$compania, $especialidad]) }}">
            {{ $especialidad->denominacion }}
        </a>
    @endforeach
    <a href="{{ route('crear-cita-compania') }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
</x-create-citas>
