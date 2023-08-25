<div class="ml-auto">
    <x-button-enlace class="pulse_boton cursor-pointer" wire:click="$set('open',true)">
        <i class="fa-solid fa-file-arrow-up mr-2"></i> Subir Documento
    </x-button-enlace>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Informe de Suficiencia Técnica
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="archivo"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">!Archivo Cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que el archivo se haya procesado</span>

            </div>

            {{-- @if ($archivo)
            <iframe type="aplication/pdf" class="m-auto" data="{{$archivo->temporaryUrl()}}" alt=""> 
            </iframe> 
            @endif --}}

            <div class="mb-4">
                <x-jet-label value="N° de Cite del Informe (MPR/VA/DGA/UAUyM IST N° 010/2023)" />
                <x-jet-input type="text" class="w-full  mb-2" wire:model="numruta" />
                <x-jet-input-error for="numruta" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Fecha de Inicio de Trámite" />
                <x-jet-input type="date" class="w-full  mb-2" wire:model="fecha" />
                <x-jet-input-error for="fecha" />
            </div>

            <div class="mb-2 w-full">
                <x-jet-label value="Observación" />
                <textarea name="" id="" cols="10" rows="2" class="form-control w-full mb-2" wire:model="observacion"></textarea>
                <x-jet-input-error for="observacion" />
            </div>

            <div>
                <x-jet-label class="mb-2" value="Seleccionar el archivo" />
                <input type="file" accept="application/pdf" wire:model="archivo" id="{{ $identificador }}">
                <x-jet-input-error for="archivo" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, archivo"
                class="disabled:opacity-25">
                Confirmar operación
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>
</div>



