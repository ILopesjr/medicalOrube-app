<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Atualização de Sala') }}
        </h2>
    </x-slot>

        <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
            <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
                <form id="form"  method="post" action="{{ route('room.update', $room->id) }}" novalidate>
                    @csrf
                    @method('PUT')

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
                        <label for="">Sala</label>
                        <input
                            type="text"
                            name="number"
                            required
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            value="{{ $room->number }}"
                        />
                    </div>

                    <button
                        id="button"
                        type="submit"
                        class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-green-400 hover:bg-green-800 hover:shadow-lg focus:outline-none"
                    >
                        Atualizar
                    </button>
                </form>
            </div>
        </div>
</x-app-layout>
