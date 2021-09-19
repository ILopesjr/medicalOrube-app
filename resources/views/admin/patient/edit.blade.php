<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Atualizar dados do Paciente') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("patient.update", $patient->id) }}" novalidate>
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
                    <label for="">Nome</label>
                    <input
                        type="text"
                        name="name"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->name }}"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">CPF</label>
                    <input
                        type="text"
                        name="cpf"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->cpf }}"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Sexo</label>
                    <select
                        name="gender"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="M" {{ $patient->gender == "M" ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ $patient->gender == "F" ? 'selected' : '' }}>Feminino</option>
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Endereço</label>
                    <input
                        type="text"
                        name="address"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->address }}"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Plano de Saúde</label>
                    <select
                        name="health_plans"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="" selected>Plano de Saúde</option>
                        @foreach( $health_plans as $health_plan)
                            <option
                                value="{{ $health_plan->id }}" {{ $health_plan->id == $patient->id_health_plans ? 'selected' : '' }}>{{ $health_plan->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">E-mail</label>
                    <input
                        type="email"
                        name="email"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->email }}"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Senha</label>
                    <input
                        type="password"
                        name="password"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
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
