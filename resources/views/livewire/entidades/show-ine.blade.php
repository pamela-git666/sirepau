<div class="max-w-5xl bg-white rounded-lg shadow-lg mx-auto px-4 py-2 sm:px-6 lg:px-8 mt-3">
    @if ($ines->count())
        <div class="flex py-2">
            <x-jet-checkbox class="bg-red-600 mr-2" disabled checked value="aes" />
            <span class="font-bold text-blue-500">
                Instituto Nacional de Estadísticas
            </span>
        </div>
    @else
        <div class="flex py-2">
            <x-jet-checkbox class="bg-red-600 mr-2" disabled checked value="aes" />
            <span class="font-bold text-blue-500">
                Instituto Nacional de Estadísticas
            </span>
            @role('tecnico')
                @livewire('entidades.create-ine', ['ritu' => $ritu], key($ritu->id))
            @endrole
        </div>
    @endif


    <div>
        <x-table-responsive>

            @if ($ines->count())
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
                                Fecha de Emisión
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Observaciones
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

                        @foreach ($ines as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex">
                                        <div class="ml-2">
                                            <span class="text-blue-600 font-bold">N° Ruta</span>
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
                                            <span class="text-gray-900 font-medium">{{ $item->observacion }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-2">
                                            @livewire('entidades.show-doc-ine', ['item' => $item], key($item->id))
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
                                                wire:click="$emit('deleteIne',{{ $item->id }})">
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

            @if ($ines->hasPages())
                <div class="px-6 py-4">
                    {{ $ines->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Instituto Nacional de Estadísticas
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="archivo"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que el archivo se haya procesado</span>

            </div>

            {{-- @if ($archivo)
            <iframe type="aplication/pdf" class="m-auto" data="{{$archivo->temporaryUrl()}}" alt=""> 
            </iframe> 
            @endif --}}

            <div class="mb-4">
                <x-jet-label value="N° Ruta " />
                <x-jet-input type="text" class="w-full  mb-2" wire:model="ine.numruta" />
                <x-jet-input-error for="ine.numruta" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Emisión" />
                <x-jet-input type="date" class="w-full  mb-2" wire:model="ine.fecha" />
                <x-jet-input-error for="ine.fecha" />
            </div>

            <div class="mb-2 w-full">
                <x-jet-label value="Observación" />
                <textarea name="" id="" cols="10" rows="2" class="form-control w-full mb-2"
                    wire:model="ine.observacion"></textarea>
                <x-jet-input-error for="ine.observacion" />
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
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update, archivo"
                class="disabled:opacity-25">
                Confirmar operación
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteIne', ineId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar este registro?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('entidades.show-ine', 'delete', ineId);

                        Swal.fire(
                            'Eliminado!',
                            'El registro fue eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
