<div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        @livewire('tecnico.status-tramite', ['tramite' => $tramite])

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-4 items-center w-auto">
            <div class="px-6 py-1.5 font-bold text-red-600 text-lg">
                ETAPA: <span class="text-gray-900">INICIO</span>
            </div>
            @hasrole('responsable')
                <a type="button" href="{{ route('responsable.tramite.index', $tramite) }}"
                    class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-file-contract mr-1"></i>Resumen</a>
            @else
                <a type="button" href="{{ route('admin.tramites.show', $tramite) }}"
                    class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-file-contract mr-1"></i>Resumen</a>
            @endhasrole
            <a type="button" href="{{ route('inicio.index', $tramite) }}"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"><i
                    class="fa-solid fa-file-pen text-white mr-1"></i>Inicio</a>
            <a class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                href="{{ route('resadmin.index', $tramite) }}">Resolución Administrativa</a>

        </div>

        @if ($tramite->status > 0)
            {{-- Datos de Tramites --}}
            <div class="bg-white  px-12 py-4 mb-4 rounded-lg shadow-lg border-gray-300">
                <div class="flex px-2 py-2 sm:px-6">
                    <h2 class="text-center  text-2xl font-bold leading-6 text-blue-700">Solicitud de Inicio de Trámite
                    </h2>
                    @role('tecnico')
                        <x-button-enlace class="ml-auto cursor-pointer" wire:click="$set('open',true)">
                            <i class="fa-solid fa-file-circle-plus mr-2"></i> Agregar Documento
                        </x-button-enlace>
                    @endrole
                </div>

                <x-table-responsive>

                    <div class="px-6 py-4 bg-gray-400">
                        <x-jet-input type="text" wire:model="search" class="w-full"
                            placeholder="Ingrese el documento que quiere buscar" />
                    </div>

                    @if ($initramis->count())
                        <table class="min-w-full divide-y divide-blue-400">
                            <thead class="bg-gray-600">
                                <tr scope="col"
                                    class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                        Referencia
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                        Fecha de Inicio de Trámite
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                        Tipo
                                    </th>
                                    @role('tecnico')
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    @endrole

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-blue-400">

                                @foreach ($initramis as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex">
                                                <div class="ml-2">
                                                    <span class="text-blue-600 font-bold">N° Cite del tramite</span>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $item->numruta }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-2">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-2">
                                                    <span class="text-blue-600 font-bold">{{ $item->tipo }}</span>
                                                    <div class="text-sm font-medium text-gray-900 my-2">
                                                        <a href="#" class="btn btn-green mr-4  cursor-pointer"
                                                            wire:click="file({{ $item }})">
                                                            <i class="fa-solid fa-eye"></i> Ver Documento
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @role('tecnico')
                                            <td class="px-2 py-4 whitespace-nowrap  text-sm font-medium">
                                                <div class="inline-flex rounded-md shadow-sm">

                                                    <a href="#" class="btn btn-blue cursor-pointer mr-2"
                                                        title="Editar" wire:click="edit({{ $item }})">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-red cursor-pointer mr-2"
                                                        title="Eliminar"
                                                        wire:click="$emit('deleteInitram',{{ $item->id }})">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>


                                                </div>
                                            </td>
                                        @endrole
                                    </tr>
                                @endforeach
                                <!-- More people... -->
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            <span class="font-bold">No hay ningún registro coincidente</span>
                        </div>
                    @endif

                    @if ($initramis->hasPages())
                        <div class="px-6 py-4">
                            {{ $initramis->links() }}
                        </div>
                    @endif

                </x-table-responsive>

            </div>

    </div>

    {{-- Modal agregar Documento --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registro de Inicio de Trámite
        </x-slot>

        <x-slot name="content">
            <div wire:loading wire:target="archivo"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que el archivo se haya procesado</span>

            </div>

            <div class="mb-4">
                <x-jet-label value="N° de Cite de Tramite " />
                <x-jet-input type="text" class="w-full  mb-2" wire:model="createForm.numruta" />
                <x-jet-input-error for="createForm.numruta" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Inicio de Trámite" />
                <x-jet-input type="date" class="w-full  mb-2" wire:model="createForm.fecha" />
                <x-jet-input-error for="createForm.fecha" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="createForm.tipo">
                    <option value="" selected>Seleccione una opción
                    </option>
                    <option value="Nota de Solicitud de Trámite">Nota de Solicitud de Inicio de Trámite</option>
                    <option value="Informe Técnico Urbano">Informe Técnico Urbano</option>
                </select>
                <x-jet-input-error for="createForm.tipo" />
            </div>

            <div>
                <x-jet-label class="mb-2" value="Seleccionar el archivo" />
                <input type="file" accept="application/pdf" wire:model="archivo" id="{{ $identificador }}">
                <x-jet-input-error for="archivo" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">
                Confirmar operación
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>
    {{-- Fin Modal agregar Documento --}}
    {{-- Modal Editar --}}
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            ACTUALIZAR RESPONSABLE
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="archivo"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que el archivo se haya procesado</span>
            </div>

            <div class="mb-4">
                <x-jet-label value="N° de Cite de Tramite" />
                <x-jet-input type="text" class="w-full  mb-2" wire:model="editForm.numruta" />
                <x-jet-input-error for="editForm.numruta" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Inicio de Trámite" />
                <x-jet-input type="date" class="w-full  mb-2" wire:model="editForm.fecha" />
                <x-jet-input-error for="editForm.fecha" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="editForm.tipo">
                    <option value="" selected>Seleccione una opción
                    </option>
                    <option value="Nota de Solicitud de Trámite">Nota de Solicitud de Inicio de Trámite</option>
                    <option value="Informe Técnico Urbano">Informe Técnico Urbano</option>
                </select>
                <x-jet-input-error for="editForm.tipo" />
            </div>

            <div>
                <x-jet-label class="mb-2" value="Seleccionar el archivo" />
                <input type="file" accept="application/pdf" wire:model="editArchivo" id="{{ $identificador }}">
                <x-jet-input-error for="editArchivo" />
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
    {{-- Fin Modal Editar --}}

    {{-- Modal Ver Documento --}}
    <x-modal-simple wire:model="open_documento">
        <x-slot name="title">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white capitalize">

                {{ $this->numruta }}
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open_documento', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">

            <div class="w-full h-auto">
                <embed class="w-full" style="height: 460px" src="{{ Storage::url($this->direccion) }}"
                    type="application/pdf">

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_documento', false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>
    </x-modal-simple>
    {{-- Fin Modal Ver Documento --}}
@else
    <div class="flex bg-white rounded-lg shadow-lg px-12 py-4 mb-4 items-center w-auto">
        <div class="mr-3">
            <span class="flex animate-bounce  items-center justify-center h-10 w-10 rounded-full bg-red-500">
                <i class="fa-solid fa-hand text-white"></i>
            </span>

        </div>
        <div class="text-blue-600">
            <span class="font-bold text-lg text-blue-500">
                No se encuentra habilitada la etapa Inicio de Trámite
            </span>
        </div>
    </div>
    @endif


</div>

@push('script')
    <script src="sweetalert2.all.min.js"></script>

    <script>
        Livewire.on('deleteInitram', initramId => {
            Swal.fire({
                title: 'Estas seguro de eliminar este documento?',

                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('tecnico.inicio-tramite', 'delete', initramId);

                    Swal.fire(
                        'Eliminado!',
                        'El documento fue eliminado.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
