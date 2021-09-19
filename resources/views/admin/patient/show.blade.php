<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dados do Paciente') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("patient.store") }}" novalidate>
                @csrf
                <div class="relative z-0 w-full mb-5">
                    <label for="">Nome</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Nome"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->name }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">CPF</label>
                    <input
                        type="text"
                        name="cpf"
                        placeholder="CPF"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->cpf }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Sexo</label>
                    <select disabled
                        name="gender"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option>{{ $patient->gender == 'M' ? 'Masculino' : ($patient->gender == 'F' ? 'Feminino' : 'Não binario') }}</option>

                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Endereço</label>
                    <input
                        type="text"
                        name="address"
                        placeholder="Endereço"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->address }}"
                        readonly
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Plano de Saúde</label>
                    <select disabled
                        name="health_plans"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option>{{ $health_plan->name ?? '' }}</option>
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">E-mail</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="E_mail"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->email }}"
                        readonly
                    />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
