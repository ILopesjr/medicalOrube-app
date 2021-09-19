<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Cadastro de Consulta') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("appointment.update", $appointment->id) }}" novalidate>
                @csrf
                @method('PUT')
                <input name="id_patient" type="hidden" value="{{ $patient->id }}">
                <input name="gender" type="hidden" value="{{ $patient->gender }}">
                <input name="id_doctor" type="hidden" value="{{ $doctor->id }}">
                <input name="service_date" type="hidden" value="{{ $appointment->service_date }}">
                <input name="visible" type="hidden" value="0">
                <div class="relative z-0 w-full mb-5">
                    <label for="">Paciente</label>
                    <input
                        type="text"
                        placeholder="Nome"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->name }}"
                        readonly
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="">Sexo</label>
                    <input
                        type="text"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->gender == 'M' ? 'Masculino' : ($patient->gender == 'F' ? 'Feminino' : 'Não Informado') }}"
                        readonly
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="">Idade</label>
                    <input
                        type="number"
                        name="age"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="">Altura</label>
                    <input
                        type="text"
                        name="height"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="">Peso</label>
                    <input
                        type="text"
                        name="weight"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="end_time_attendance">Horário Inicial</label>
                    <input
                        type="time"
                        name="initial_time_attendance"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="end_time_attendance">Horário Final</label>
                    <input
                        type="time"
                        name="end_time_attendance"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="end_time_attendance">Doença ou Queixa</label>
                    <textarea
                        name="complaint_disease"
                        row="3"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    ></textarea>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="end_time_attendance">Procedimento</label>
                    <textarea
                        name="proceedings"
                        row="3"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    ></textarea>
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
