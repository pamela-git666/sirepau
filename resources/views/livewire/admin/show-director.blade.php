<div>
    <x-slot name="header">
        <div class="flex items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Administradores') }}
        </h2>
        <div class="ml-auto">
            @livewire('admin.create-director')
        </div>
        </div>
    </x-slot>

    <div class="container py-12">

        <x-table-responsive>

            <div class="px-6 py-4 bg-gray-400">

                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese el nombre del administrador que quiere buscar" />

            </div>

            @if ($directores->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-600">
                        <tr scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                Email
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

                        @foreach ($directores as $item)
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
                                <td class="px-6 py-4">
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
                                                {{ $item->user->email }} 
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



                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    <a href="#" class="btn btn-blue cursor-pointer mr-2"
                                        wire:click="edit({{ $item }})" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-red cursor-pointer" title="Eliminar"
                                        wire:click="$emit('deleteDirector',{{ $item->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
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

            @if ($directores->hasPages())
                <div class="px-6 py-4">
                    {{ $directores->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Actualizar Administrador
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="C.I." />
                <x-jet-input type="text" class="w-full" wire:model="director.ci" />
                <x-jet-input-error for="director.ci" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos" />
                <x-jet-input type="text" class="w-full" wire:model="director.apellidos" />
                <x-jet-input-error for="director.apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombres" />
                <x-jet-input type="text" class="w-full" wire:model="director.nombres" />
                <x-jet-input-error for="director.nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="director.cargo" />
                <x-jet-input-error for="director.cargo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Celular" />
                <x-jet-input type="number" class="w-full" wire:model="director.celular" />
                <x-jet-input-error for="director.celular" />
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
            Livewire.on('deleteDirector', directorId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar a este administrador?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-director', 'delete', directorId);

                        Swal.fire(
                            'Eliminado!',
                            'El administrador fue eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
