<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dados da Sala') }}
        </h2>
    </x-slot>

        <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
            <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
                <form id="form"  method="post" action="{{ route('room.store') }}" novalidate>
                    @csrf
                    <div class="relative z-0 w-full mb-5">
                        <label for="">Sala</label>
                        <input
                            type="text"
                            name="number"
                            required
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            value="{{ $room->number }}"
                            readonly
                        />
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
