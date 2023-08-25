<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        
        @livewire('tecnico.status-tramite', ['tramite' => $tramite])
      
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-4 items-center w-auto">
            <a type="button" href="{{ route('responsable.tramite.index', $tramite) }}"
                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                    class="fa-solid fa-file-contract mr-1"></i>Resumen</a>
        </div>

        {{-- Datos de Tramites --}}
        <div class="bg-white p-2 mb-2 rounded-lg shadow-lg border-gray-300">
            <div class="px-2 py-2 sm:px-6">
                <h2 class="text-center  text-2xl font-bold leading-6 text-blue-700">TRÁMITE DE HOMOLOGACIÓN</h2>
            </div>
            <div class="px-6 py-2 mb-2 flex items-center">
                <p class="text-blue-700 uppercase"><span class="font-semibold">N° Informe:</span>
                    {{ $tramite->no_inf }}</p>
                {{-- <a href="{{ route('descargarPDFPrestamo',$prestamo) }}"
                    class="pulse_boton cursor-pointer px-2 py-2 font-medium tracking-wide ml-auto text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80" target="_blank"> --}}
                <div class="ml-auto inline-flex rounded-md shadow-sm">

                    <div class="ml-auto mt-1">
                        <a href="{{ route('descargarPDFTramite',$tramite->id ) }}"
                            class="pulse_boton cursor-pointer px-2 py-2 font-medium tracking-wide ml-auto text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
                            target="_blank">
                            <i class="fa-solid fa-print"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Departamento:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tramite->departamento->nombre }}</dd>
                        <dt class="text-sm font-medium text-gray-500">Provincia:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tramite->provincia->nombre }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Municipio</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tramite->municipio->nombre }}</dd>
                        <dt class="text-sm font-medium text-gray-500">Centro Poblado:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $tramite->centro_poblado }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                        <dt class="text-sm font-semibold text-gray-700">Técnico Asignado:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tramite->tecnico->nombres }} {{ $tramite->tecnico->apellidos }}</dd>
                        <dt class="text-sm font-semibold text-gray-700">Cel. ref. Técnico:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tramite->tecnico->celular }}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 py-4 sm:px-6">
                <span class="font-semibold text-blue-700 ">RESPONSABLES DEL TRÁMITE</span>
                <div class="border-t border-gray-200">
                        <div class="mt-1">
                            <span class="font-semibold">Datos de Responsable</span>
                        </div>
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Responsable:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ auth()->user()->responsable->nombres }} {{ auth()->user()->responsable->apellidos }}</dd>
                                <dt class="text-sm font-medium text-gray-500">Cargo:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{  auth()->user()->responsable->cargo  }}
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">C.I.:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{  auth()->user()->responsable->ci }}</dd>
                                <dt class="text-sm font-medium text-gray-500">Cel. de Referencia:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{  auth()->user()->responsable->celular }}
                                </dd>
                            </div>
                        </dl>
                </div>
            </div>
        </div>
        {{-- Fin Datos de Tramites --}}

        {{-- Vista Documentos y Ritus --}}
        {{-- <div class="grid grid-cols-2 bg-white  p-2 mb-2 rounded-lg shadow-lg border-gray-300">
            @livewire('tecnico.show-ritu', ['tramite' => $tramite], key($tramite->id))
            @livewire('admin.show-documento', ['tramite' => $tramite], key($tramite->id))
        </div> --}}
        {{-- Fin Vista Documentos y Ritus --}}

    </div>
</x-app-layout>

