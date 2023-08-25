<div class="mt-2 mx-1">
    <a href="#" class="btn btn-green ml-auto cursor-pointer" title="Agregar Responsable"
        wire:click="$set('open',true)">
        <i class="fa-solid fa-user-plus"></i>
    </a>

    {{-- Modal --}}
    <x-modal-simple wire:model="open">
        <x-slot name="title">
            Registro de Responsable
        </x-slot>

        <x-slot name="content">
            <div class="flex p-1.5">
                <a href="#" wire:click="$set('abrir_agregar',1)" class="ml-auto btn btn-red"><i
                        class="fa-solid fa-address-card mr-2 text-lg"></i>Agregar Solicitante</a>
            </div>
            @if ($this->abrir_agregar == 1)
                <div>
                    {{--Formulario de registro--}}
                    <div class="grid grid-cols-3">
                        <div class="mb-4 mx-1.5">
                            <x-jet-label value="Apellidos" />
                            <x-jet-input type="text" class="w-full" wire:model="createForm.apellidos" />
                            <x-jet-input-error for="createForm.apellidos" />
                        </div>

                        <div class="mb-4 mx-1.5">
                            <x-jet-label value="Nombres" />
                            <x-jet-input type="text" class="w-full" wire:model="createForm.nombres" />
                            <x-jet-input-error for="createForm.nombres" />
                        </div>
                        <div class="mb-4 mx-1.5">
                            <x-jet-label value="C.I." />
                            <x-jet-input type="number" class="w-full" wire:model="createForm.ci" />
                            <x-jet-input-error for="createForm.ci" />
                        </div>

                        <div class="mb-4 mx-1.5">
                            <x-jet-label value="Cargo" />
                            <x-jet-input type="text" class="w-full" wire:model="createForm.cargo" />
                            <x-jet-input-error for="createForm.cargo" />
                        </div>
                        <div class="mb-4 mx-1.5">
                            <x-jet-label value="Designación" />
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                wire:model="createForm.designacion">
                                <option value="" selected>Seleccione una opción
                                </option>
                                <option value="GAM">GAM</option>
                                <option value="GAIOCS">GAIOCS</option>
                            </select>
                            <x-jet-input-error for="createForm.designacion" />
                        </div>

                        <div class="mb-4 mx-1.5">
                            <x-jet-label value="Celular" />
                            <x-jet-input type="number" class="w-full" wire:model="createForm.celular" />
                            <x-jet-input-error for="createForm.celular" />
                        </div>

                    </div>
                    <div class="mb-4 mx-1.5">
                        <x-jet-label value="Email" />
                        <x-jet-input type="email" class="w-full" wire:model="createForm.email" />
                        <x-jet-input-error for="createForm.email" />
                    </div>
                    {{--Confirmar--}}
                    <div class="flex mt-2">
                        <div class="ml-auto">
                            <a href="#" wire:click="$set('abrir_agregar',0)" class="btn btn-blue">CANCELAR</a>
                            <a href="#" wire:click="save" wire:loading.attr="disabled" wire:target="save" class="btn btn-red">CONFIRMAR OPERACIÓN</a>
                        </div>
                    </div>
                    {{--Fin de Confirmar--}}
                    {{--Fin Formulario de registro--}}
                </div>
            @endif
            {{-- Lista --}}
            <div>
                <x-table-responsive>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-800">
                            <tr>
                                <th scope="col"
                                    class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white tracking-wider">
                                    <span>Apellidos y Nombres</span>
                                </th>
                                <th scope="col"
                                    class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                    <span>Cargo</span>
                                </th>
                                <th scope="col"
                                    class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                    <span>Designación</span>
                                </th>
                                <th scope="col"
                                    class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                    <span>Correo</span>
                                </th>

                                <th scope="col"
                                    class="cursor-pointer px-1 py-3 text-left text-xs font-semibold text-white  tracking-wider">
                                    <span>Acciones</span>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y-2 divide-gray-200">
                            @foreach ($tramite->responsables as $item)
                                <tr>
                                    <td class="px-1 py-1 ">
                                        <div class="text-sm text-gray-900">
                                            {{ $item->apellidos }} {{ $item->nombres }}
                                        </div>
                                    </td>
                                    <td class="px-1 py-1 ">
                                        <div class="text-sm text-gray-900">
                                            {{ $item->cargo }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm text-gray-900">
                                            {{ $item->designacion }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-sm text-gray-900">
                                            {{ $item->user->email }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="text-sm text-white">
                                            <a href="#" wire:click="delete({{ $item->id }})" class="bg-red-600 p-1 rounded"><i class="fa-solid fa-trash mr-1"></i> Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-table-responsive>
            </div>
            {{-- Fin Lista --}}
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

    </x-modal-simple>
</div>
