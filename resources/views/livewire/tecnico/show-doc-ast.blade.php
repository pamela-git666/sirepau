<div class="mt-2  px-1">
    <a href="#" class="btn btn-green mr-2  cursor-pointer" wire:click="$set('open',true)">
        <i class="fa-solid fa-eye mr-2"></i>Ver Documento
    </a>
    <x-modal-simple wire:model="open">
        <x-slot name="title">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white capitalize">
                {{ $ast->numruta }}
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="w-full h-auto">
                <iframe class="w-full" style="height: 460px" src="{{ Storage::url($ast->archivo) }}"
                    type="application/pdf">
                </iframe>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open', false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>
    </x-modal-simple>
</div>

