<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Atualização de marcação de Consulta') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <form id="form" method="post" action="{{ route("appointment.update", $appointment->id) }}" novalidate>
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
                    <label for="">Médico</label>
                    <select
                        name="id_doctor"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="">Médico</option>
                        @foreach( $doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->id_doctor ? 'selected' : ''}}>{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label for="">Paciente</label>
                    <select
                        name="id_patient"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    >
                        <option value="">Paciente</option>
                        @foreach( $patients as $patient)
                            <option value="{{ $patient->id }}" {{ $patient->id == $appointment->id_patient ? 'selected' : ''}}>{{ $patient->name }}</option>
                        @endforeach
                    </select>
                    @foreach( $patients as $patient)
                        <input name="gender" type="hidden" value="{{ $patient->gender }}">
                    @endforeach
                </div>

                <div class="flex flex-row space-x-4">
                    <div class="relative z-0 w-full mb-5">
                        <label for="">Data</label>
                        <input
                            type="text"
                            name="service_date"
                            placeholder="Data"
                            onclick="this.setAttribute('type', 'date');"
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                            value="{{ date('d-m-Y', strtotime($appointment->service_date)) }}"
                        />
                    </div>
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
