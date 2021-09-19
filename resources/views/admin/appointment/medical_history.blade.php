<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Histórico da Consulta') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" novalidate>
                @csrf
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
                        placeholder="Sexo"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $patient->gender == 'M' ? 'Masculino' : ($patient->gender == 'F' ? 'Feminino' : 'Não Informado') }}"
                        readonly
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="age">Idade</label>
                    <input
                        type="number"
                        name="age"
                        placeholder="Idade"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $history->age }}"
                        readonly
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="height">Altura</label>
                    <input
                        type="text"
                        name="height"
                        placeholder="Altura"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ str_replace('.', ',', $history->height) }}"
                        readonly
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="weight">Peso</label>
                    <input
                        type="text"
                        name="weight"
                        placeholder="Peso"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ str_replace('.', ',', $history->weight) }}"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="end_time_attendance">Doença ou Queixa</label>
                    <textarea
                        name="complaint_disease"
                        row="3"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        readonly
                    >{{ $history->complaint_disease }}</textarea>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="end_time_attendance">Procedimento</label>
                    <textarea
                        name="proceedings"
                        row="3"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        readonly
                    >{{ $history->proceedings }}</textarea>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label for="id_doctor">Médico</label>
                    <input
                        type="text"
                        name="id_doctor"
                        placeholder="Altura"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        value="{{ $doctor->name }}"
                        readonly
                    />
                    <div class="relative z-0 w-full mb-5">
                        <label for="end_time_attendance">Horário Inicial</label>
                        <input
                            type="time"
                            name="initial_time_attendance"
                            placeholder="Horário inicial"
                            required
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            value="{{ date('H:i', strtotime($history->initial_time_attendance)) }}"
                            readonly
                        />
                    </div>
                    <div class="relative z-0 w-full mb-5">
                        <label for="end_time_attendance">Horário Final</label>
                        <input
                            type="time"
                            name="end_time_attendance"
                            placeholder="Horário Final"
                            required
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            value="{{ date('H:i', strtotime($history->end_time_attendance)) }}"
                        />
                    </div>
                    <div class="flex flex-row space-x-4">
                        <div class="relative z-0 w-full mb-5">
                            <label for="service_date">Data Atendimento</label>
                            <input
                                type="text"
                                name="service_date"
                                placeholder="Data"
                                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                                value="{{ date('d-m-Y', strtotime($history->service_date)) }}"
                                readonly
                            />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
