<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Trámites') }}
            </h2>

            @role('ejecutivo|operativo')
                <div class="ml-auto">
                    @livewire('admin.create-tramite')
                </div>
            @endrole

        </div>
    </x-slot>

    <div class="container py-12">
        <x-table-responsive>

            <div class="px-6 py-4 bg-gray-400">
                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese el número de informe que quiere buscar" />
            </div>

            @if ($tramites->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-600">
                        <tr scope="col"
                            class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                N° Inf.
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Departamento
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Provincia
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Municipio
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Situación
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Status
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-400">

                        @foreach ($tramites as $tramite)
                            <tr>
                                <td class="px-2 py-4 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $tramite->no_inf }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                 {{ $tramite->departamento->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $tramite->provincia->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $tramite->municipio->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $tramite->situacion }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                              
                                <td class="px-2 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
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
                                                        Resolución
                                                    </span>
                                                @break

                                                @default
                                            @endswitch
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4   text-sm font-medium whitespace-nowrap">
                                    <div class="inline-flex rounded-md shadow-sm">
                                        <a href="#" class="btn btn-blue cursor-pointer mr-2" title="Editar"
                                            wire:click="edit({{ $tramite }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @role('administrador')
                                            <a href="#" class="btn btn-red cursor-pointer mr-2" title="Eliminar"
                                                wire:click="$emit('deleteTramite',{{ $tramite->id }})">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        @endrole

                                        @role('tecnico')
                                            @livewire('admin.create-responsable', ['tramite' => $tramite], key($tramite->id))
                                        @endrole
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($tramites->hasPages())
                <div class="px-6 py-4">
                    {{ $tramites->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Actualizar Trámites
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Departamento" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="departamento_id">
                    <option value="" class="hidden">Seleccione un departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="departamento_id " />
            </div>

            @if ($provincias)
                <div class="mb-4">
                    <x-jet-label value="Provincia" />
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model="provincia_id">
                        <option value="" class="hidden">Seleccione una provincia</option>
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="provincia_id" />
                </div>
            @endif

            @if ($municipios)
                <div class="mb-4">
                    <x-jet-label value="Municipio" />
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model="municipio_id">
                        <option value="" class="hidden">Seleccione un municipio</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="municipio_id" />
                </div>
            @endif

            <div class="mb-4">
                <x-jet-label value="Centro poblado" />
                <x-jet-input type="text" class="w-full" wire:model="tramite.centro_poblado" />
                <x-jet-input-error for="tramite.centro_poblado" />
            </div>

            <div class="grid grid-cols-2">
                <div class="mb-4 mr-3">
                    <x-jet-label value="N° Informe" />
                    <x-jet-input type="number" class="w-full" wire:model="tramite.no_inf" />
                    <x-jet-input-error for="tramite.no_inf" />
                </div>


                <div class="mb-4">
                    <x-jet-label value="Situacion" />
                    <x-jet-input type="text" class="w-full" wire:model="tramite.situacion" />
                    <x-jet-input-error for="tramite.situacion" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteTramite', tramiteId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar el trámite?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-tramite', 'delete', tramiteId);

                        Swal.fire(
                            'Eliminado!',
                            'El tramite fue eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
