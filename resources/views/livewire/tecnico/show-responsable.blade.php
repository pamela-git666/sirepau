<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Responsables') }}
            </h2>
            {{--
            <div class="ml-auto">
                @livewire('admin.create-responsable')
            </div>
            --}}
        </div>
    </x-slot>

    <div class="container py-12">

        <x-table-responsive>

            <div class="px-6 py-4 bg-gray-400">
                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese el nombre del Responsable que quiere buscar" />
            </div>

            @if ($responsables->count())
                <table class="min-w-full divide-y divide-blue-400">
                    <thead class="bg-gray-600 ">
                        <tr scope="col"
                            class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                C.I.
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Apellidos
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Nombres
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Cargo
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Celular
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-400">

                        @foreach ($responsables as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->ci }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->apellidos }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->nombres }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->cargo }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->celular }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap  text-sm font-medium">
                                    <div class="inline-flex rounded-md shadow-sm">
                                        @role('tecnico')
                                        <a href="#" class="btn btn-blue cursor-pointer mr-2" title="Editar"
                                            wire:click="edit({{ $item }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-red cursor-pointer mr-2" title="Eliminar"
                                            wire:click="$emit('deleteResponsable',{{ $item->id }})">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                        @endrole
                                        @if ($item->tramite)
                                            @livewire('admin.aut-tramite', ['item' => $item], key($item->id))
                                        @else
                                            @livewire('admin.create-tramite', ['item' => $item], key($item->id))
                                        @endif
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

            @if ($responsables->hasPages())
                <div class="px-6 py-4">
                    {{ $responsables->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
          ACTUALIZAR RESPONSABLE
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="C.I." />
                <x-jet-input type="text" class="w-full" wire:model="responsable.ci" />
                <x-jet-input-error for="responsable.ci" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos" />
                <x-jet-input type="text" class="w-full" wire:model="responsable.apellidos" />
                <x-jet-input-error for="responsable.apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombres" />
                <x-jet-input type="text" class="w-full" wire:model="responsable.nombres" />
                <x-jet-input-error for="responsable.nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="responsable.cargo" />
                <x-jet-input-error for="responsable.cargo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Celular" />
                <x-jet-input type="number" class="w-full" wire:model="responsable.celular" />
                <x-jet-input-error for="responsable.celular" />
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
            Livewire.on('deleteResponsable', autoridadId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar a la Responsable?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-responsable', 'delete', responsableId);

                        Swal.fire(
                            'Eliminado!',
                            'Los datos del responsable fueron eliminados .',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

