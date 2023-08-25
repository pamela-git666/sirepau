<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">

    @livewire('tecnico.status-tramite', ['tramite' => $tramite])

    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-4 items-center w-auto">
        <div class="px-6 py-1.5 font-bold text-red-600 text-lg">
           ETAPA: <span class="text-gray-900">PREPARATORIA</span>
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
        <a type="button" href="{{ route('infbase.index', $tramite) }}"
            class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                class="fa-solid fa-file-import text-white mr-1"></i>Información Base</a>
    </div>

    {{-- INFORMACIÓN BASE  --}}
    <div class="bg-white rounded-lg shadow-lg px-12 py-4 mb-4 items-center w-auto">
        <div class="flex px-2 py-2 sm:px-6">
            <span class="text-center  text-xl font-bold leading-6 text-blue-700">Información Base</span>
            @role('tecnico')
                @livewire('tecnico.create-infbase', ['tramite' => $tramite], key($tramite->id))
            @endrole
        </div>

        <x-table-responsive>

            <div class="px-6 py-2 bg-gray-400">
                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese datos del documento que quiere buscar" />
            </div>

            @if ($infbases->count())
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
                                Fecha de Solicitud
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

                        @foreach ($infbases as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex">
                                        <div class="ml-2">
                                            <span class="text-blue-600 font-bold">N° Hoja de Ruta</span>
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
                                            <span class="text-blue-600 font-bold capitalize">{{ $item->tipo }}</span>
                                            @if ( !($item->numcite == 's/c') )
                                            <p class="font-semibold text-sm">N° CITE: {{ $item->numcite}}</p>
                                            @endif
                                            @livewire('tecnico.show-doc-infbase', ['item' => $item], key($item->id))
                                        </div>
                                    </div>
                                </td>
                                @role('tecnico')
                                    <td class="px-2 py-4 whitespace-nowrap  text-sm font-medium">
                                        <div class="inline-flex rounded-md shadow-sm">
                                            <a href="#" class="btn btn-blue cursor-pointer mr-2"
                                                wire:click="edit({{ $item }})">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-red cursor-pointer"
                                                wire:click="$emit('deleteInfbase',{{ $item->id }})">
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
                <div class="px-6 py-4 font-bold">
                    No existen registros de este trámite
                </div>
            @endif

            @if ($infbases->hasPages())
                <div class="px-6 py-4">
                    {{ $infbases->links() }}
                </div>
            @endif

        </x-table-responsive>

    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            ACTUALIZAR INFORMACIÓN BASE
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="archivo"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que el archivo se haya procesado</span>
            </div>
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full  mb-2" wire:model="infbase.numruta" />
                <x-jet-input-error for="infbase.numruta" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Inicio Trámite" />
                <x-jet-input type="date" class="w-full  mb-2" wire:model="infbase.fecha" />
                <x-jet-input-error for="infbase.fecha" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="infbase.tipo">
                    <option value="" selected>Seleccione una opción
                    </option>
                    <option value="solicitud">Solicitud Información Base</option>
                    <option value="respuesta">Respuesta Información Base</option>
                </select>
                <x-jet-input-error for="infbase.tipo" />
            </div>
            <div class="mb-4">
                <x-jet-label value="N° de Cite" />
                <span class="text-red-500 text-sm">*Llenar solo en caso de seleccionar respuesta información base</span>
                <x-jet-input type="text" class="w-full  mb-2" wire:model="infbase.numcite" />
                <x-jet-input-error for="infbase.numcite" />
            </div>

            <div>
                <x-jet-label class="mb-2" value="Seleccionar el archivo" />
                <input type="file" accept="application/pdf" wire:model="archivo" id="{{ $identificador }}">
                <x-jet-input-error for="archivo" />
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
    {{-- FIN Infbase --}}

</div>

@push('script')
    <script src="sweetalert2.all.min.js"></script>

    <script>
        Livewire.on('deleteInfbase', infbaseId => {
            Swal.fire({
                title: 'Estas seguro de eliminar este documento?',

                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('tecnico.informacion-base', 'delete', infbaseId);

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
