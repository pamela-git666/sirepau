<div class="mt-2">
    <a href="#" class="btn btn-green ml-auto cursor-pointer" title="Ver Trámite" wire:click="$set('open',true)">
        <i class="fa-solid fa-eye"></i> Ver Datos
    </a>
    <x-modal-simple wire:model="open">
        <x-slot name="title">
            <div class="text-center text-lg text-gray-900 mt-3 font-bold">
                DATOS DEL SOLICITANTE Y SU TRÁMITE
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="w-full px-4 flex items-start flex-col md:flex-row pt-4">
                <div class="w-full px-4">
                    <div class="px-4 py-1 sm:px-6">
                        <h4 class="text-lg leading-6 font-blue text-blue-600">Datos de la Autoridad</h4>
                    </div>
                    <div class="border-t border-blue-400">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-semibold text-blue-600">Apellidos y Nombres:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->apellidos }} {{ $autoridad->nombres }}</dd>
                                <dt class="text-sm font-semibold text-blue-600">Cargo:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->cargo }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-semibold text-blue-600">C.I.:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $autoridad->ci }}
                                </dd>
                                <dt class="text-sm font-semibold text-blue-600">N° Celular:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->celular }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <h4 class="text-lg leading-6 font-medium text-blue-600">Datos del Trámite</h4>
                    </div>
                    <div class="border-t border-blue-400">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-semibold text-blue-600">Departamento:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->departamento->nombre }}
                                <dt class="text-sm font-semibold text-blue-600">Municipio:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->municipio->nombre }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-semibold text-blue-600">Provincia:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->provincia->nombre }}
                                </dd>
                                <dt class="text-sm font-semibold text-blue-600">Centro Poblado:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->centro_poblado }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-semibold text-blue-600">N° Inf.:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->no_inf }}</dd>
                                <dt class="text-sm font-semibold text-blue-600">Situación:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->situacion }}</dd>
                                <dt class="text-sm font-semibold text-blue-600">Etapa:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    @switch($autoridad->tramite->fase)
                                        @case(1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                                Preparatoria
                                            </span>
                                        @break

                                        @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-white">
                                                Inicio
                                            </span>
                                        @break

                                        @case(3)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                Análisis
                                            </span>
                                        @break

                                        @case(4)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                Resolución
                                            </span>
                                        @break

                                        @default
                                    @endswitch
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="px-4 py-5 sm:px-6">
                        <h4 class="text-lg leading-6 font-medium text-blue-600">Técnico Asignado</h4>
                    </div>
                    <div class="border-t border-blue-400">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-semibold text-blue-600">Técnico:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->tecnico->nombres }}
                                    {{ $autoridad->tramite->tecnico->apellidos }}
                                <dt class="text-sm font-semibold text-blue-600">Cel. de Referencia:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $autoridad->tramite->tecnico->celular }}</dd>
                            </div>
                        </dl>
                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open', false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>
    </x-modal-simple>
</div>
