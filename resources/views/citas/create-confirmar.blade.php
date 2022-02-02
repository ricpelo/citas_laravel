<x-create-citas>
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
</x-create-citas>
