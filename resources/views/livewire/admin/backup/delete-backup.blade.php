<div>
    <x-jet-dialog-modal wire:model="modal_delete">
        <x-slot name="title">
            <div class="text-center text-red-600 mt-3 font-bold">
                ELIMINAR BACKUP 
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex items-center justify-center w-full">
                <span class="animate-bounce px-16">
                    <i class="fa-solid fa-circle-exclamation text-5xl text-red-600"></i>
                </span>
                <div>
                    <h1 class="text-gray-700 text-2xl">
                        ¿Estás seguro de eliminar este archivo?
                    </h1>
                    @if ($deletingFile)
                        <h2 class="text-md text-gray-800 font-bold">
                            {{ $deletingFile['date'] }} ?
                        </h2>
                    @endif
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-1.5" wire:click.prevent="cancel">
                CANCELAR
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="deleteFile" wire:loading.attr="disabled" wire:target="deleteFile"
                class="disabled:opacity-25">
                ELIMINAR
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>