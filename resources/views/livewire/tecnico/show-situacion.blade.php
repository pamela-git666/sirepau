<div class="px-6">
    <span class="font-semibold text-blue-700"> SITUACIÓN ACTUAL </span>
    @if ($tramite->situacion)
        <div class="grid grid-cols-2 px-2 border-t border-gray-200">
            <div>
                {{ $tramite->situacion }}
            </div>
            @hasrole('tecnico')
            <div class="ml-auto m-2 p-2">
                <x-jet-secondary-button class="bg-blue-600 mr-2" wire:click="edit({{ $tramite->id }})"
                    wire:loading.attr="disabled">
                    <span class="text-white">Actualizar Situación</span>
                </x-jet-secondary-button>
            </div>
            @endhasrole

        </div>

        {{-- Modal --}}
        <x-jet-dialog-modal wire:model="open">

            <x-slot name="title">
                Editar Situación
            </x-slot>

            <x-slot name="content">

                <div>
                    <x-jet-label>
                        Situación
                    </x-jet-label>
                    <textarea class="w-full" wire:model="editForm.situacion" name="" id="" cols="10" rows="3"></textarea>

                    <x-jet-input-error for="editForm.situacion" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-button class="bg-blue-600" wire:click="update" wire:loading.attr="disabled" wire:target="update">
                    Actualizar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    @endif
</div>
