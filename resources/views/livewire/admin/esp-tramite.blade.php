<div class="mt-2">
    @role('operativo')
    <a href="#" class="btn btn-green ml-auto cursor-pointer" title="Ver Trámites Asignados"
        wire:click="$set('open',true)">
        <i class="fa-solid fa-folder-open"></i>
    </a>
    @else

    <a href="#" class="btn btn-green ml-auto cursor-pointer" title="Ver Trámites Asignados"
        wire:click="$set('open',true)">
        <i class="fa-solid fa-folder-open mr-1"></i> Ver trámites
    </a>
    @endrole
    <x-modal-simple wire:model="open">
        <x-slot name="title">
            <div class="text-center text-gray-900 mt-3 font-bold">
                TRÁMITES DE TÉCNICO
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="w-full px-4 pb-3 flex items-start flex-col md:flex-row pt-4">
                <div class="w-full px-4">
                    <div class="px-4 py-5 sm:px-6">
                        <h4 class="text-lg leading-6 font-medium text-gray-900">Datos del Técnico</h4>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Apellidos y Nombres:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $tecnico->apellidos }} {{ $tecnico->nombres }}
                                </dd>
                                <dt class="text-sm font-medium text-gray-500">Cargo:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $tecnico->cargo }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-6 sm:gap-6 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">C.I.:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $tecnico->ci }}
                                </dd>
                                <dt class="text-sm font-medium text-gray-500">N° Celular:</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $tecnico->celular }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="px-4 py-5 sm:px-6">
                        <h4 class="text-lg leading-6 font-medium text-gray-900">Trámites Asignados</h4>
                    </div>
                    <x-table-responsive>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-800">
                                <tr>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white tracking-wider">
                                        <span>N° Inf.</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Departamento</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Provincia</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Municipio</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Centro Poblado</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Inicio de Trámite</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Etapa</span>
                                    </th>
                                    <th scope="col"
                                        class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                        <span>Ver</span>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y-2 divide-gray-200">
                                @foreach ($tecnico->tramites as $tramite)
                                    <tr>
                                        <td class="px-1 py-1 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $tramite->no_inf }}
                                            </div>
                                        </td>
                                        <td class="px-1 py-1 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $tramite->departamento->nombre }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900">
                                                {{ $tramite->provincia->nombre }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900">
                                                {{ $tramite->municipio->nombre }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900">
                                                {{ $tramite->centro_poblado }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900">
                                                {{ \Carbon\Carbon::parse($tramite->updated_at)->format('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td>
                                            @switch($tramite->fase)
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
                                                        Emisión de resolución
                                                    </span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900">
                                                <a href="{{ route('admin.tramites.show', $tramite) }}" title="ir trámite">
                                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-table-responsive>
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
