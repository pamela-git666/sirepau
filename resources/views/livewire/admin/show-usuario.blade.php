<div>
    <x-slot name="header">
        <div class="flex items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
        <x-button-enlace class="ml-auto" href="{{ route('usuarios.create')}}">
            <i class="fa-solid fa-user-plus mr-2"></i>  Agregar Usuario
        </x-button-enlace>
        </div>
    </x-slot>

    <div class="container py-12">

        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese los datos del usuario que quiere buscar" />

            </div>

            @if ($usuarios->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Usuario
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Apellidos y Nombres
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                          
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($usuarios as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->name }} 
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->especialista }} 
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                               Roles
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    <a href="#" class="btn btn-blue cursor-pointer mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-red cursor-pointer">
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

            @if ($usuarios->hasPages())
                <div class="px-6 py-4">
                    {{ $usuarios->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
    {{--
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Actualizar Carrera
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="C.I." />
                <x-jet-input type="text" class="w-full" wire:model="especialista.ci" />
                <x-jet-input-error for="especialista.ci" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos" />
                <x-jet-input type="text" class="w-full" wire:model="especialista.apellidos" />
                <x-jet-input-error for="especialista.apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombres" />
                <x-jet-input type="text" class="w-full" wire:model="especialista.nombres" />
                <x-jet-input-error for="especialista.nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="especialista.cargo" />
                <x-jet-input-error for="especialista.cargo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Telefono" />
                <x-jet-input type="number" class="w-full" wire:model="especialista.telefono" />
                <x-jet-input-error for="especialista.telefono" />
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
            Livewire.on('deleteEspecialista', especialistaId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar al especialista?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-especialista', 'delete', especialistaId);

                        Swal.fire(
                            'Eliminado!',
                            'El especialista fue eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
    --}}
</div>
