<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Cadastro de Reserva') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("reserve.store") }}" novalidate>
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="relative z-0 w-full mb-5">
                    <select
                        name="id_doctor"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="" selected>Médico</option>
                        @foreach( $doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <select
                        name="id_room"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="" selected>Salas</option>
                        @foreach( $rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-row space-x-4">
                    <div class="relative z-0 w-full mb-5">
                        <input
                            type="text"
                            name="lease_date"
                            placeholder="Data"
                            onclick="this.setAttribute('type', 'date');"
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        />
                    </div>
                </div>

                <div class="block mt-4">
                    <label for="available" class="inline-flex items-center">
                        <input id="available" type="checkbox"
                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               name="available"
                        value="1">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Reserva') }}</span>
                    </label>
                </div>

                <button
                    id="button"
                    type="submit"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-green-400 hover:bg-green-800 hover:shadow-lg focus:outline-none"
                >
                    Cadastrar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
