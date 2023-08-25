<div class="bg-white shadow-lg rounded-lg px-8 py-4 text-gray-700">
    <div>
        <span class="font-bold text-blue-600 text-xl">Áreas Urbanas Homologadas</span>
    </div>
    <div>
        <span class="font-bold text-blue-600 text-sm"><i class="fas fa-search-location text-xl"></i> Buscar</span>
    </div>
    <div class="grid lg:grid-cols-4">
        <div class="p-2 flex">
            @if ($this->selectedDepartamento || $this->selectedMunicipio || $this->selectedProvincia || $this->search)
            <div class="mr-3 pt-8">
                <a href="#" class="bg-blue-600 cursor-pointer text-white rounded p-3" 
                 wire:click="limpiarBuscador()" title="Reset">
                    <i class="text-lg fa-solid fa-eraser"></i>
                </a>
            </div>
            @endif
            
            <div>
                <label for="underline_select" class="font-semibold text-gray-800">Departamento</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model="selectedDepartamento">
                    <option value="" selected>Seleccione un departamento
                    <option>
                        @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="p-2">
            <label for="underline_select" class="font-semibold text-gray-900">Provincia</label>

            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                wire:model="selectedProvincia">
                <option value="" selected>Seleccione una provincia
                <option>
                    @foreach ($provincias as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                @endforeach
            </select>

        </div>

        <div class="p-2">
            <label for="underline_select" class="text-gray-900 font-semibold">Municipio</label>
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                wire:model="selectedMunicipio">
                <option value="" selected>Seleccione un municipio
                <option>
                    @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="p-2">
            <div class="ml-1">
                <label for="underline_select" class="text-gray-900 font-semibold ">Centro Poblado</label>
                <input type="text" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar centro poblado" wire:model="search">

            </div>
        </div>
    </div>


    @if ($tramits)
        @if ($tramits->count())
            <section class="bg-white shadow-lg rounded-lg px-8 py-4 mt-6 text-gray-700">
                <h1 class="text-2xl mb-4 font-bold">Resultados de búsqueda</h1>
                <span class="text-blue-600 font-bold">{{ $tramits->count()}}</span> Registros encontrados
                <ul>
                    @foreach ($tramits as $item)

                        <li>
                            <div
                                class="flex items-center py-2 px-4 hover:bg-gray-100 border-b-2 border-gray-500">
                                <span class="w-12 text-center">
                                    @switch($item->fase)
                                        @case(1)
                                        <i class="fas fa-file-alt text-3xl text-blue-600"></i>
                                        @break

                                        @case(2)
                                        <i class="fas fa-file-alt text-3xl text-blue-600"></i>
                                        @break

                                        @case(3)
                                        <i class="fas fa-file-alt text-3xl text-blue-600"></i>
                                        @break

                                        @case(4)
                                        <i class="fas fa-file-alt text-3xl text-blue-600"></i>
                                        @break

                                        @default
                                    @endswitch
                                </span>

                                <span>
                                    <strong>Código:</strong> {{ $item->no_inf }} <strong>Departamento:</strong>
                                    {{ $item->departamento->nombre }}
                                    <br>
                                    <strong>Provincia</strong> {{ $item->provincia->nombre }}
                                    <strong>Municipio:</strong> {{ $item->municipio->nombre }}
                                    <br>
                                    <strong>Centro Poblado</strong> {{ $item->centro_poblado }}
                                </span>

                                <div class="ml-auto">
                                    <div class="py-2">
                                        <a class="bg-blue-500 p-1.5 cursor-pointer rounded text-white font-semibold"
                                        wire:click="info({{ $item }})">
                                            mas información 
                                            <i class="fas fa-external-link-alt mr-1"></i>
                                      </a>
                                    </div>
                                    
                                    <span class="font-semibold">       
                                        @switch($item->fase)
                                            @case(1)
                                                <span class="font-semibold text-gray-700">Trámite en curso</span>
                                            @break

                                            @case(2)
                                                <span class="font-semibold text-gray-700">Trámite en curso</span>
                                            @break

                                            @case(3)
                                                <span class="font-semibold text-gray-700"> Trámite en curso
                                                </span>
                                            @break

                                            @case(4)
                                                <span class="font-semibold text-gray-700"> Área Homologada 
                                                </span>
                                            @break

                                            @default
                                        @endswitch
                                         
                                    </span>
                                       

                                    <br>

                                    <span class="text-sm">
                                        <span class="font-bold text-gray-600">Inicio de Trámite:</span>
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </span>
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
        @else
            <div class="px-6 py-4 font-bold">
                No hay resultados en la búsqueda .......
            </div>
        @endif

    @endif

        {{-- Guia de Delimitacion --}}
        <x-jet-dialog-modal wire:model="open_info">
            <x-slot name="title">
               {{-- <div>
                    <span class="font-semibold text-2xl text-blue-600">Información</span>
                </div>
                --}}  
                <div class="flex">
                   <div class="ml-auto">
                    <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="extralarge-modal" wire:click="$set('open_info', false)">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                   </div>
                </div>
                
            </x-slot>
    
            <x-slot name="content">
              <div >
                 <div class="flex flex-col justify-center items-center">
                    <img class="h-44 w-96" src="{{ asset('img/logo.png')}}" alt="">
                 </div>
                 <div class="flex flex-col justify-center items-center">
                    <span class="text-gray-700 text-xl mb-3">
                        Para obtener el Certificado de Área Urbana Homologada apersonarse o comunicarse.
                    </span>
                      <div class="grid grid-cols-2">
                        <div class="mb-6 px-12">
                            <h5 class="capitalize font-bold mb-2.5 text-blue-600 text-xl">Dirección</h5>
        
                            <ul class="list-none mb-0">
                                <li>
                                    <p class="font-bold uppercase mb-2"><i class="fas fa-map-marker-alt"></i> CASA GRANDE DEL
                                        PUEBLO</p>
                                </li>
                                <li>
                                    <p class="font-semibold mb-2">Zona Central - Calle Ayacucho Esq. Potosí</p>
                                </li>
                                <li>
                                    <p class="font-semibold">La Paz - Bolivia</p>
                                </li>
        
                            </ul>
                        </div>
        
                        <div class="mb-6 px-12">
                            <h5 class="capitalize font-bold mb-2.5 text-blue-600 text-xl">Contactos</h5>
                            <ul class="list-none mb-0">
                                <li>
                                    <p class="mb-2"><span class="font-semibold"><i class="fas fa-envelope"></i>
                                            Email:</span> viceministerio@gmail.com</p>
                                </li>
                                <li>
                                    <p class="mb-2"><span class="font-semibold"><i class="fas fa-phone-alt"></i>
                                            Telefono:</span> (591-2) 2153845</p>
                                </li>
                                <li>
                                    <p class="mb-2"><span class="font-semibold"><i class="fas fa-fax"></i> Fax:</span>
                                        2153931</p>
                                </li>
        
                            </ul>
        
                        </div>
        
                    </div>
                 </div>
              </div>
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-danger-button wire:click="$set('open_info',false)">
                    Cerrar
                </x-jet-danger-button>
            </x-slot>
    
        </x-jet-dialog-modal>
        {{-- Fin de Guia de Delimitacion --}}
</div>

