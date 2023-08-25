<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-4 flex items-center">
            <div class="relative">
                <div
                    class="{{ $tramite->status >= 1 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-import text-white"></i>
                </div>

                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">Inicio</p>
                </div>
            </div>

            <div
                class="{{ $tramite->status >= 2 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>

            <div class="relative">

                <div
                    class="{{ $tramite->status >= 2 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-pen text-white"></i><br>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p class="font-semibold">Admisión</p>
                </div>
            </div>

            <div
                class="{{ $tramite->status >= 3 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>

            <div class="relative">
                <div
                    class="{{ $tramite->status >= 3 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-circle-question text-white"></i>
                </div>

                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">A.S.T.</p>
                </div>
            </div>
            <div
                class="{{ $tramite->status >= 4 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>

            <div class="relative">

                <div
                    class="{{ $tramite->status >= 4 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center mt-1">
                    <i class="fa-solid fa-gavel text-white"></i>
                </div>
                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">A.C.L.</p>

                </div>
            </div>
            <div
                class="{{ $tramite->status >= 5 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>
            <div class="relative">
                <div
                    class="{{ $tramite->status >= 5 && $tramite->status != 6 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-circle-check text-white"></i>
                </div>

                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">H.A.U.</p>
                </div>
            </div>
        </div>
        {{-- Datos de Tramites --}}
        <div class="bg-white p-2 mb-2 rounded-lg shadow-lg border-gray-300">
            <div class="px-2 py-2 sm:px-6">
                <h3 class="text-center text-lg leading-6 font-medium text-gray-900">TRÁMITE DE HOMOLOGACIÓN</h3>
            </div>
            <div class="px-6 py-2 mb-2 flex items-center">
                <p class="text-gray-700 uppercase"><span class="font-semibold">N° Informe:</span>
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
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $tramite->municipio }}</dd>
                        <dt class="text-sm font-medium text-gray-500">Centro Poblado:</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $tramite->centro_poblado }}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="px-4 py-4 sm:px-6">
                <h4 class="text-lg leading-6 font-medium text-gray-900 pb-4">DATOS DE AUTORIDAD</h4>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Autoridad:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $tramite->autoridad->nombres }} {{ $tramite->autoridad->apellidos }}</dd>
                            <dt class="text-sm font-medium text-gray-500">Cargo:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $tramite->autoridad->cargo }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">C.I.:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $tramite->autoridad->ci }}</dd>
                            <dt class="text-sm font-medium text-gray-500">Telefono:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $tramite->autoridad->telefono }} 
                            </dd>
                        </div>

                    </dl>
                </div>
            </div>
        </div>
        {{-- Fin Datos de Tramites --}}

       {{-- Vista Documentos y Ritus --}}
        <div class="grid grid-cols-2 bg-white  p-2 mb-2 rounded-lg shadow-lg border-gray-300">
            @livewire('tecnico.show-ritu', ['tramite' => $tramite], key($tramite->id))
            @livewire('admin.show-documento', ['tramite' => $tramite], key($tramite->id))       
         </div>
         {{--Fin Vista Documentos y Ritus --}}
      
    </div>
</x-app-layout>
