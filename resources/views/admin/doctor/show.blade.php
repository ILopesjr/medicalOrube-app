<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dados do Médico') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("doctor.store") }}" novalidate>
                @csrf
                <div class="relative z-0 w-full mb-5">
                    <label for="">Nome</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Nome"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $doctor->name }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">CRM</label>
                    <input
                        type="text"
                        name="crm"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $doctor->crm }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Especialização</label>
                    <input
                        type="text"
                        name="specialization"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $doctor->Specialization }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Endereço</label>
                    <input
                        type="text"
                        name="address"
                        placeholder="Endereço"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $doctor->address }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">E-mail</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="E_mail"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $doctor->email }}"
                        readonly
                    />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
