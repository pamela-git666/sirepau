<div class="max-w-5xl  mx-auto px-1 sm:px-6 lg:px-2 pt-6">
    @livewire('tecnico.status-tramite', ['tramite' => $tramite])

    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-4 items-center w-auto">
        <div class="px-6 py-1.5 font-bold text-red-600 text-lg">
            ETAPA: <span class="text-gray-900">ANÁLISIS</span>
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
        <a type="button" href="{{ route('ritu.index', $tramite) }}"
            class="focus:outline-none text-white bg-green-400 hover:bg-green-400 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-green-700 dark:focus:ring-green-900"><i
                class="fa-solid fa-file-circle-question text-white mr-1"></i>Revisión de Informe Técnico Urbano</a>
        <a class="focus:outline-none text-white bg-green-400 hover:bg-green-400 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-green-700 dark:focus:ring-green-900"
            href="{{ route('ast.index', $tramite) }}">Informe de Suficiencia Técnica</a>

        {{-- <div class="dropdown inline-block relative">
            <button class="bg-green-400 text-white py-2 px-4 rounded-lg inline-flex items-center">
                <span class="font-semibold">Análisis de Suficiencia Técnica</span><i class="fa-solid fa-arrow-turn-down ml-2"></i>
            </button>
            <ul class="dropdown-content absolute hidden text-white pt-1">
                <li><a class="bg-green-500 hover:bg-green-800 py-2 px-4 block whitespace-no-wrap"
                    href="{{ route('resadmin.index', $tramite) }}">Resolución Administrativa</a></li>
            <li><a class="bg-green-500 hover:bg-green-800 py-2 px-4 block whitespace-no-wrap"
                    href="{{ route('ast.index', $tramite) }}">Informe de Suficiencia Técnica</a></li>
            <li><a class="bg-green-500 hover:bg-green-800 py-2 px-4 block whitespace-no-wrap"
                    href="{{ route('itu.index', $tramite) }}">Informe Técnico Urbano</a></li>
            </ul>
        </div> --}}
    </div>
    {{-- AST --}}
    <div class="bg-white rounded-lg shadow-lg px-12 py-4 mb-4 items-center w-auto">
        <div class="flex px-2 py-2 sm:px-6">
            <h2 class="text-center  text-2xl font-bold leading-6 text-blue-700">Informe de Suficiencia Técnica</h2>
            @role('tecnico')
                @livewire('tecnico.create-ast', ['tramite' => $tramite], key($tramite->id))
            @endrole
        </div>

        <x-table-responsive>

            <div class="px-6 py-2 bg-gray-400">
                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese datos del documento que quiere buscar" />
            </div>

            @if ($asts->count())
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
                                Documento
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

                        @foreach ($asts as $item)
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
                                            @livewire('tecnico.show-doc-ast', ['item' => $item], key($item->id))
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
                                                wire:click="$emit('deleteAst',{{ $item->id }})">
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

            @if ($asts->hasPages())
                <div class="px-6 py-4">
                    {{ $asts->links() }}
                </div>
            @endif

        </x-table-responsive>

    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Actualizar Análisis de Suficiencia Técnica
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="archivo"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que el archivo se haya procesado</span>
            </div>
            <div class="mb-4">
                <x-jet-label value="N° de Cite del tramite" />
                <x-jet-input type="text" class="w-full  mb-2" wire:model="ast.numruta" />
                <x-jet-input-error for="ast.numruta" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Inicio de Trámite" />
                <x-jet-input type="date" class="w-full  mb-2" wire:model="ast.fecha" />
                <x-jet-input-error for="ast.fecha" />
            </div>

            <div class="mb-2 w-full">
                <x-jet-label value="Observación" />
                <textarea name="" id="" cols="10" rows="2" class="form-control w-full mb-2"
                    wire:model="ast.observacion"></textarea>
                <x-jet-input-error for="ast.observacion" />
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
    {{-- FIN AST --}}
</div>
@push('css')
    <style>
        .dropdown:hover>.dropdown-content {
            display: block;
        }
    </style>
@endpush

@push('script')
    <script src="sweetalert2.all.min.js"></script>

    <script>
        Livewire.on('deleteAst', astId => {
            Swal.fire({
                title: 'Estas seguro de eliminar este documento?',

                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('tecnico.show-ast', 'delete', astId);

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
