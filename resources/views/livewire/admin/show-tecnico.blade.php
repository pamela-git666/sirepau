<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Técnicos') }}
            </h2>
            @role('operativo')
            <div class="ml-auto">
                @livewire('admin.create-tecnico')
            </div>
            @endrole
        </div>
    </x-slot>

    <div class="container py-12">

        <x-table-responsive>

            <div class="px-6 py-4  bg-gray-400">

                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese el nombre del técnico que quiere buscar......" />

            </div>

            @if ($tecnicos->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-600">
                        <tr scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Apellidos y Nombres
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Cargo
                            </th>
                           @role('operativo')
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Estado de Usuario
                            </th>
                            @endrole
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Acciones
                            </th>
                    
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-400">

                        @foreach ($tecnicos as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->apellidos }}  {{ $item->nombres }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->cargo }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @role('operativo')
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                              <div class="m-2">
                                                <label>
                                                    <input {{ count($item->user->roles) ? 'checked' : '' }} value="1" type="radio"
                                                        name="{{ $item->user->email }}"
                                                        wire:change="assignRole({{ $item->user->id }}, $event.target.value)">
                                                    Activo
                                                </label>
            
                                                <label class="ml-2">
                                                    <input {{ count($item->user->roles) ? '' : 'checked' }} value="0" type="radio"
                                                        name="{{ $item->user->email }}"
                                                        wire:change="assignRole({{ $item->user->id }}, $event.target.value)">
                                                    Inactivo
                                                </label>
                                            </div>    

                                            <div class="text-sm font-medium text-gray-900">
                                                @if ( $item->user->roles->count() ) 
                                                <span
                                                class="mx-2 bg-green-500 text-white text-sm font-semibold mr-2 px-3 py-0.5 rounded dark:bg-green-200 dark:text-green-900"><i
                                                    class="fa-solid fa-circle-check mr-1"></i> Activo</span>
                                                @else
                                                <span
                                                class="mx-2 bg-red-500 text-white text-sm font-semibold mr-2 px-3 py-0.5 rounded dark:bg-green-200 dark:text-green-900"><i class="fa-solid fa-circle-xmark"></i> Inactivo</span>
                                                @endif
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                </td>
                                @endrole
                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    <div class="inline-flex rounded-md shadow-sm">
                                        @role('operativo')
                                        <a href="#" class="btn btn-blue cursor-pointer mr-2" title="Editar"
                                            wire:click="edit({{ $item }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{--
                                        <a href="#" class="btn btn-red cursor-pointer mr-2" title="Eliminar"
                                            wire:click="$emit('deleteTecnico',{{ $item->id }})">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                        --}}
                                        @endrole
                                        @if ($item->tramites)
                                            @livewire('admin.esp-tramite', ['item' => $item], key($item->id))
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

            @if ($tecnicos->hasPages())
                <div class="px-6 py-4">
                    {{ $tecnicos->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            ACTUALIZAR TÉCNICO
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Apellidos" />
                <x-jet-input type="text" class="w-full" wire:model="tecnico.apellidos" />
                <x-jet-input-error for="tecnico.apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombres" />
                <x-jet-input type="text" class="w-full" wire:model="tecnico.nombres" />
                <x-jet-input-error for="tecnico.nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="C.I." />
                <x-jet-input type="text" class="w-full" wire:model="tecnico.ci" />
                <x-jet-input-error for="tecnico.ci" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="tecnico.cargo" />
                <x-jet-input-error for="tecnico.cargo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Celular" />
                <x-jet-input type="number" class="w-full" wire:model="tecnico.celular" />
                <x-jet-input-error for="tecnico.celular" />
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
            Livewire.on('deleteTecnico', tecnicoId => {
                Swal.fire({
                    title: 'Estas seguro de eliminar al Técnico?',

                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.show-tecnico', 'delete', tecnicoId);

                        Swal.fire(
                            'Eliminado!',
                            'Los datos del Técnico fueron eliminados.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
