<div class="mt-2">
    <a href="#" class="btn btn-red ml-auto cursor-pointer font-semibold text-sm" wire:click="$set('open',true)">
        <i class="fa-solid fa-file-circle-plus"></i> AGREGAR TRÁMITE
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registro de Tramite
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Departamento" />
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="selectedDepartamento">
                    <option value="" selected>Seleccione un departamento
                    <option>
                        @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="selectedDepartamento" />
            </div>
            @if (!is_null($selectedDepartamento))
                <div class="mb-4">
                    <x-jet-label value="Provincia" />
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model="selectedProvincia">
                        <option value="" selected>Seleccione una provincia
                        </option>
                            @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach
            </select>
            <x-jet-input-error for="selectedProvincia" />
</div>
@endif

@if (!is_null($selectedProvincia))
    <div class="mb-4">
        <x-jet-label value="Municipio" />
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            wire:model="selectedMunicipio">
            <option value="" selected>Seleccione un municipio
            <option>
                @foreach ($municipios as $municipio)
            <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
@endforeach
</select>
<x-jet-input-error for="selectedMunicipio" />
</div>
@endif
 
<div class="mb-4">
    <x-jet-label value="Centro poblado" />
    <x-jet-input type="text" class="w-full" wire:model="centro_poblado" />
    <x-jet-input-error for="centro_poblado" />
</div>

<div class="grid grid-cols-2">
    <div class="mb-4 mr-3">
        <x-jet-label value="N° Informe" />
        <x-jet-input type="number" class="w-full" wire:model="no_inf" />
        <x-jet-input-error for="no_inf" />
    </div>


    <div class="mb-4">
        <x-jet-label value="Situacion" />
        <x-jet-input type="text" class="w-full" wire:model="situacion" />
        <x-jet-input-error for="situacion" />
    </div>
</div>

<div class="mb-4">
    <x-jet-label value="Técnico" />
    <select
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model="tecnico_id">
        <option value="">Seleccione un Técnico
        <option>
            @foreach ($tecnicos as $tecnico)
        <option value="{{ $tecnico->id }}">{{ $tecnico->nombres }} {{ $tecnico->apellidos }}</option>
        @endforeach
    </select>
    <x-jet-input-error for="tecnico_id" />
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
