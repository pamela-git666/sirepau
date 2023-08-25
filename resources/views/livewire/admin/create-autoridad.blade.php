<div>
    <x-button-enlace class="ml-auto cursor-pointer" wire:click="$set('open',true)">
        <i class="fa-solid fa-user-plus mr-2"></i>  Agregar Responsable
    </x-button-enlace>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registro de Responsable
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="C.I." />
                <x-jet-input type="number" class="w-full" wire:model="ci" />
                <x-jet-input-error for="ci" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos" />
                <x-jet-input type="text" class="w-full" wire:model="apellidos" />
                <x-jet-input-error for="apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombres" />
                <x-jet-input type="text" class="w-full" wire:model="nombres" />
                <x-jet-input-error for="nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="cargo" />
                <x-jet-input-error for="cargo" />
            </div>

             <div class="mb-4">
                <x-jet-label value="Email" />
                <x-jet-input type="email" class="w-full" wire:model="email" />
                <x-jet-input-error for="email" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Celular" />
                <x-jet-input type="number" class="w-full" wire:model="telefono" />
                <x-jet-input-error for="telefono" />
            </div>

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

    </x-jet-dialog-modal>
</div>
