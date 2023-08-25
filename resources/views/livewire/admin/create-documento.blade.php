<div class="ml-auto mx-2">
    <x-button-enlace class="pulse_boton cursor-pointer" wire:click="$set('open',true)">
        <i class="fa-solid fa-file-arrow-up mr-2"></i> Subir trámite
    </x-button-enlace>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registro de Documento
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
            <div class="mb-2">
                <x-jet-label value="Nombre de Informe" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="informe">
                    <option value="">Seleccione tipo de informe</option>
                    <option value="Informe Inicial">Informe Inicial</option>
                    <option value="Admisión de Trámite">Admisión de Trámite</option>
                    <option value="Análisis de Suficiencia Técnica">Análisis de Suficiencia Técnica</option>
                    <option value="Análisis de Concordancia Legal">Análisis de Concordancia Legal</option>
                    <option value="Homologación de Área Urbana">Homologación de Área Urbana</option>
                </select>
                <x-jet-input-error for="informe" />
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
