<div class="px-4 grid grid-cols-2 py-2">
    <div class="flex items-center">
        <p class="text-blue-700 text-semibold uppercase"><span class="font-semibold">N° Informe:</span>
            {{ $tramite->no_inf }}</p>
        @if ($tramite->status == 1)
            <span
                class="mx-2 px-2 py-1.5 bg-green-500 text-white text-sm font-semibold mr-2 rounded dark:bg-green-200 dark:text-green-900 uppercase"><i
                    class="fa-solid fa-circle-check mr-1"></i> Vigente</span>
        @elseif($tramite->status == 2)
            <span
                class="mx-2 px-2 py-1.5 bg-yellow-400 text-white text-sm font-semibold mr-2 rounded dark:bg-yellow-200 dark:text-yellow-700 uppercase"><i
                    class="fa-solid fa-hourglass mr-1"></i>Postergado</span>
        @else
            <span
                class="mx-2 px-2 py-1.5 bg-red-500 text-white text-sm font-semibold mr-2 rounded dark:bg-red-200 dark:text-red-700 uppercase"><i
                    class="fa-solid fa-circle-xmark mr-1"></i>Extinguido</span>
        @endif
    </div>

    @hasrole('tecnico')
        <div class="flex items-center p-2 ">

            <div class="w-full">

                <x-jet-secondary-button class="bg-blue-600 mr-1" wire:click="update">
                    <span class="text-white w-full">Actualizar Estado</span>
                </x-jet-secondary-button>

            </div>

            <div class="w-full">
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="status">
                    <option value="">Seleccionar</option>
                    <option value="1">Vigente</option>
                    <option value="2">Postergado</option>
                    <option value="3">Extinguido</option>
                </select>
                <x-jet-input-error for="status" />
            </div>
        </div>
    @endhasrole
</div>
