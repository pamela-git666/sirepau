<div class="my-2 bg-white shadow-lg rounded-lg p-3">

            <div class="flex px-2 py-2 sm:px-6">
                <h3 class="text-center text-lg leading-6 font-medium text-gray-900">ARCHIVOS DEL TRÁMITE</h3>
                @role('tecnico')
                @livewire('admin.create-documento', ['tramite' => $tramite], key($tramite->id))
                @endrole
            </div>
            @if ($tramite->documentos->count())
                <x-table-responsive>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="border-b bg-blue-600 border-gray-300">
                            <tr class="text-left">
                                <th class="py-2 px-2 text-white">Informe</th>
                                <th class="py-2 px-2 text-white">Acciones</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($tramite->documentos as $documento)
                                <tr>
                                    <td class="py-2 px-2">
                                        {{ $documento->informe }}
                                    </td>
                                    <td class="py-2 px-2">
                                        <div class="inline-flex rounded-md shadow-sm">
                                            @role('tecnico')
                                            <a href="#" class="btn btn-blue cursor-pointer mr-2"
                                                wire:click="edit({{ $documento }})">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endrole
                                           @livewire('admin.show-doc', ['documento' => $documento], key($documento->id))
                                           @role('tecnico')
                                            <a href="#" class="btn btn-red cursor-pointer mr-2"
                                                wire:click="$emit('deleteDocumento',{{ $documento->id }})">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                            @endrole
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-table-responsive>
            @else
                <div class="px-6 py-4">
                    No se encuentra ningun archivo.
                </div>
            @endif


    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Actualizar Documento
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
                <x-jet-label value="Nombre de Informe" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="documento.informe">
                    <option value="">Seleccione tipo de informe</option>
                    <option value="Informe Inicial">Informe Inicial</option>
                    <option value="Admisión de Trámite">Admisión de Trámite</option>
                    <option value="Análisis de Suficiencia Técnica">Análisis de Suficiencia Técnica</option>
                    <option value="Análisis de Concordancia Legal">Análisis de Concordancia Legal</option>
                    <option value="Homologación de Área Urbana">Homologación de Área Urbana</option>
                </select>
                <x-jet-input-error for="documento.informe" />
            </div>

            <div>
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

    @push('script')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteDocumento', documentoId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar este documento?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-documento', 'delete', documentoId);

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
</div>
