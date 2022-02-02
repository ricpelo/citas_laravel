<x-create-citas>
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
</x-create-citas>
