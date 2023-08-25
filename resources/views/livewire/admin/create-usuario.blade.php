<div>
    <x-slot name="header">
        <div class="items-center">
            <h1 class="text-3xl text-center font-semibold mb-2">Complete la información del Usuario</h1>
        </div>
    </x-slot>

    <div class="container py-12">
        <div class="p-8 bg-white rounded border border-gray-400">
            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- Apellidos --}}
                <div>
                    <x-jet-label value="Apellidos" />
                    <x-jet-input type="text" class="w-full" wire:model="apellidos"
                        placeholder="Ingrese los apellidos" />
                    <x-jet-input-error for="apellidos" />
                </div>

                {{-- Nombres --}}
                <div wire:ignore>
                    <x-jet-label value="Nombres" />
                    <x-jet-input type="text" class="w-full" wire:model="nombres"
                        placeholder="Ingrese los nombres" />
                    <x-jet-input-error for="nombres" />
                </div>

                {{-- ci --}}
                <div>
                    <x-jet-label value="C.I." />
                    <x-jet-input type="number" class="w-full" wire:model="ci"
                        placeholder="Ingrese su c.i." />
                    <x-jet-input-error for="ci" />
                </div>

                {{-- Correo --}}
                <div wire:ignore>
                    <x-jet-label value="Email" />
                    <x-jet-input type="email" class="w-full" wire:model="email"
                        placeholder="Ingrese el email " />
                    <x-jet-input-error for="email" />
                </div>

                {{-- Telefono --}}
                <div wire:ignore>
                    <x-jet-label value="Telefono/Celular" />
                    <x-jet-input type="text" class="w-full" wire:model="telefono"
                        placeholder="Ingrese telefono o celular " />
                    <x-jet-input-error for="telefono" />
                </div>
            </div>
           
            {{-- Cargo --}}
            <div class="mb-4">
                <x-jet-label value="Cargo" />
                <x-jet-input type="text" class="w-full" wire:model="cargo"
                    placeholder="Ingrese el cargo que ocupa" />
                <x-jet-input-error for="cargo" />
            </div>
           
            <div class="flex">
                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                    Crear Usuario
                </x-jet-button>
            </div>
        </div>
    </div>
</div>
