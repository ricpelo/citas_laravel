<x-create-citas>
    <h1>Seleccione el día y la hora</h1>
    @foreach ($citas as $cita)
    <a class="px-4 m-2 rounded bg-gray-300" href="{{ route('crear-cita-confirmar', [$compania, $cita]) }} ">
        {{ $cita->fecha_hora }}
    </a>
    @endforeach
    <a href="{{ route('crear-cita-especialista', [$compania, $especialidad]) }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
</x-create-citas>
