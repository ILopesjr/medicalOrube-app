<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Cadastro de Paciente') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("patient.store") }}" novalidate>
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
                    <input
                        type="text"
                        name="name"
                        placeholder="Nome"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        name="cpf"
                        placeholder="CPF"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <select
                        name="gender"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="M" selected>Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        name="address"
                        placeholder="Endereço"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <select
                        name="health_plans"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="" selected>Plano de Saúde</option>
                        @foreach( $health_plans as $health_plan)
                            <option value="{{ $health_plan->id }}">{{ $health_plan->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input
                        type="email"
                        name="email"
                        placeholder="E_mail"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input
                        type="password"
                        name="password"
                        placeholder="Senha"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
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
