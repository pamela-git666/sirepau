<div class="max-w-5xl rounded-lg shadow-lg">

    <div class="max-w-5xl bg-white rounded-lg shadow-lg px-8 py-8 mb-4 flex items-center">
        <div class="relative">
            <div
                class="{{ $tramite->fase >= 1 && $tramite->fase != 5 ? 'bg-red-500' : 'bg-gray-400' }}  rounded-full h-14 w-14 flex items-center justify-center">
                <i class="fa-solid fa-file-import text-white"></i>
            </div>

            <a href="{{ route('infbase.index', $tramite) }}" 
                class="absolute text-white mt-0.5 justify-center bg-red-600 cursor-pointer rounded-lg text-sm px-1.5 mx-1.5 py-0.5 mr-2 mb-2" >
                <p class="font-semibold">Preparatoria</p>
            </a>
            
        </div>

        <div class="{{ $tramite->fase >= 2 && $tramite->fase != 5 ? 'bg-yellow-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
        </div>

        <div class="relative">
            <div
                class="{{ $tramite->fase >= 2 && $tramite->fase != 5 ? 'bg-yellow-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                <i class="fa-solid fa-file-pen text-white"></i><br>
            </div>
          
            <a href="{{ route('inicio.index', $tramite) }}" class="pl-2 pr-1.5 absolute text-white mt-0.5 justify-center bg-yellow-400 cursor-pointer rounded-lg text-sm  mx-1.5 py-0.5 mr-2 mb-2" href="#" >
                <p class="font-semibold">Inicio</p>
            </a>
        </div>

        <div
            class="{{ $tramite->fase >= 3 && $tramite->fase != 5 ? 'bg-green-500' : 'bg-gray-400' }} h-2 flex-1 mx-1">
        </div>

        <div class="relative">
            <div
                class="{{ $tramite->fase >= 3 && $tramite->fase != 5 ? 'bg-green-500' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                <i class="fa-solid fa-file-circle-question text-white"></i>
            </div>

            <a href="{{ route('ritu.index', $tramite) }}"
            class="pl-2 pr-1.5 absolute text-white mt-0.5 justify-center bg-green-400 cursor-pointer rounded-lg text-sm   py-0.5 mr-3 mb-2" href="#" >
                <p class="font-semibold">Análisis</p>
            </a>
        </div>

        <div
            class="{{ $tramite->fase >= 4 && $tramite->fase != 5 ? 'bg-green-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
        </div>

        <div class="relative">
            <div
                class="{{ $tramite->fase >= 4 && $tramite->fase != 5 ? 'bg-green-500' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center mt-1">
                <i class="fa-solid fa-gavel text-white"></i>
            </div>
            <a href="{{ route('leylimitacion.index', $tramite) }}" class="pl-2 pr-1.5 absolute text-white mt-0.5 justify-center bg-green-400 cursor-pointer rounded-lg text-sm  py-0.5 mr-3 mb-2">
                <p class="font-semibold">Resolución</p>
            </a>
        </div>
        
    </div>
    @role('tecnico')
        <div class="bg-white rounded-lg shadow-lg px-12 py-2  mb-4">
            <form wire:submit.prevent="update">
                <div>
                    <span class="text-blue-600 font-bold px-1">Actualizar Etapa del Trámite</span>
                </div>
                <div class="flex space-x-3 mt-2">
                    <x-jet-label>
                        <input wire:model="fase" type="radio" name="fase" value="1" class="mr-2">
                        Preparatoria
                    </x-jet-label>

                    <x-jet-label>
                        <input wire:model="fase" type="radio" name="fase" value="2" class="mr-2">
                        Inicio
                    </x-jet-label>

                    <x-jet-label>
                        <input wire:model="fase" type="radio" name="fase" value="3" class="mr-2">
                        Análisis
                    </x-jet-label>
                    <x-jet-label>
                        <input wire:model="fase" type="radio" name="fase" value="4" class="mr-2">
                        Emisión de Resolución
                    </x-jet-label>
                </div>

                <div class="flex mt-2">
                    <x-jet-button class="bg-blue-600 ml-auto font-bold">
                        <i class="fa-solid fa-arrows-rotate mr-2"></i> Actualizar
                    </x-jet-button>
                </div>
            </form>
        </div>
    @endrole

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">

            <div class="mb-4 text-center">
                <i class="animate-bounce text-red-500 text-8xl fa-solid fa-circle-exclamation"></i>
            </div>
            <div class="p-2 text-center">
                <span class="text-red-600 font-semibold text-2xl">¡Advertencia!</span>
            </div>
            <div class="p-2 text-center">
                <span class="text-gray-800 font-semibold text-2xl">¡No se puede realizar esta acción!</span>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click="$set('open',false)">
                Cerrar
            </x-jet-danger-button>
            {{-- <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, archivo"
                class="disabled:opacity-25">
                Confirmar operación
            </x-jet-danger-button> --}}

        </x-slot>

    </x-jet-dialog-modal>

</div>
