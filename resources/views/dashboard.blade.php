<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="py-6">
                        <a class="px-4 py-2 rounded bg-gray-300" href="{{ route('ver-citas') }}">Ver citas</a>
                    </div>
                    <div class="py-6">
                        <a class="px-4 py-2 rounded bg-green-300" href="{{ route('crear-cita') }}">Nueva cita</a>
                    </div>
                    <form class="py-4" action="{{ route('logout') }}" method="POST">
                        @method('POST')
                        @csrf
                        <button class="px-4 py-2 rounded bg-blue-300" type="submit">Salir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
