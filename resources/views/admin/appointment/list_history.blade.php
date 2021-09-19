<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Históricos dos Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- component -->
                <body class="antialiased font-sans bg-gray-200">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div class="my-2 flex sm:flex-row flex-col flex-no-wrap">
                            <form method="POST" action="{{ route('appointment.searchHistory') }}" class="flex sm:flex-row flex-col">
                                @csrf
                                <input placeholder=Pesquisar name="search"
                                       class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"/>
                                <x-button class="ml-2">
                                    {{ __('Pesquisar') }}
                                </x-button>
                            </form>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Paciente
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Data
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Ações
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $histories as $history)
                                        <form action="{{  route('appointment.delete', $history->id)  }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="delete_history" value="delete">
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                @foreach( $patients as $patient)
                                                                    {{ $history->id_patient == $patient->id ? $patient->name : '' }}
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ date('d-m-Y', strtotime($history->service_date)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap flex flex-row">

                                                        <a href="{{  route('appointment.medicalHistory', $history->id)  }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                 fill="none"
                                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                                            </svg>
                                                        </a>

                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-6"
                                                                 fill="none"
                                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                    </p>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div
                                    class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between ">
                        <span class="text-xs xs:text-sm text-gray-900">
                            @if(isset($filters))
                                {{  $histories->appends($filters)->links() }}
                            @else
                                {{  $histories->links() }}
                            @endif
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </body>
            </div>
        </div>
    </div>
</x-app-layout>
