<div>
    <x-jet-button class="ml-auto cursor-pointer" wire:click="$set('open',true)">
        Agregar Archivo 
    </x-jet-button>
    
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registro de Documento
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="archivo" class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado</span>
                
            </div>

            {{-- @if ($archivo)
            <iframe type="aplication/pdf" class="m-auto" data="{{$archivo->temporaryUrl()}}" alt=""> 
            </iframe> 
            @endif
            --}}

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="nombre"/>
                <x-jet-input-error for="nombre"/>                

            </div>
            <div>
                <input type="file" accept="application/pdf" wire:model="archivo" id="{{$identificador}}">
                <x-jet-input-error for="archivo"/> 
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, archivo" class="disabled:opacity-25">
                Confirmar operación
            </x-jet-danger-button>
       
        </x-slot>
 
    </x-jet-dialog-modal>
</div>
