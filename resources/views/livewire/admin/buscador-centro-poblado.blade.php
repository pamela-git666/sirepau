<div class="bg-white shadow-lg rounded-lg px-8 py-4 my-3 text-gray-700">
    <div>
        <span class="font-bold text-blue-600 text-xl">BUSCADOR DE TRÁMITES</span>
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
                <label for="underline_select" class="text-gray-800">Departamento</label>
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
            <label for="underline_select" class="text-gray-900">Provincia</label>

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
            <label for="underline_select" class="text-gray-900">Municipio</label>
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
                <label for="underline_select" class="text-gray-900">Centro Poblado</label>
                <input type="text" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar centro poblado" wire:model="search">

            </div>
        </div>
    </div>


    @if ($tramits)
        @if ($tramits->count())
            <section class="bg-white shadow-lg rounded-lg px-8 py-4 mt-6 text-gray-700">
                <h1 class="text-2xl mb-4">Resultados de búsqueda</h1>
                <span class="text-blue-600 font-bold">{{ $tramits->count()}}</span> Registros encontrados
                <ul>
                    @foreach ($tramits as $tramite)
                        <li class="border-b-2 border-gray-400">
                            <a href="{{ route('admin.tramites.show', $tramite) }}"
                                class="flex items-center py-2 px-4 hover:bg-gray-100">
                                <span class="w-12 text-center">
                                    @switch($tramite->fase)
                                        @case(1)
                                            <i class="fa-solid fa-file-import text-xl text-red-500"></i>
                                        @break

                                        @case(2)
                                            <i class="fa-solid fa-file-pen text-xl text-yellow-400"></i>
                                        @break

                                        @case(3)
                                            <i class="fa-solid fa-file-circle-question text-xl text-green-500"></i>
                                        @break

                                        @case(4)
                                            <i class="fa-solid fa-gavel text-xl text-green-500"></i>
                                        @break

                                        @default
                                    @endswitch
                                </span>

                                <span>
                                    <strong>Código:</strong> {{ $tramite->no_inf }} <strong>Departamento:</strong>
                                    {{ $tramite->departamento->nombre }}
                                    <br>
                                    <strong>Provincia</strong> {{ $tramite->provincia->nombre }}
                                    <strong>Municipio:</strong> {{ $tramite->municipio->nombre }}
                                    <br>
                                    <strong>Centro Poblado</strong> {{ $tramite->centro_poblado }}
                                </span>

                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($tramite->fase)
                                            @case(1)
                                                Fase: <span class="font-bold text-red-500">Preparatoria</span>
                                            @break

                                            @case(2)
                                                Fase: <span class="font-bold text-yellow-500">Admisión </span>
                                            @break

                                            @case(3)
                                                Fase: <span class="font-bold text-green-500"> Análisis
                                                </span>
                                            @break

                                            @case(4)
                                                Fase: <span class="font-bold text-green-500"> Emisión de Resolución
                                                </span>
                                            @break

                                            @default
                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                        <span class="font-bold text-gray-600">Inicio de Trámite:</span>
                                        {{ $tramite->created_at->format('d/m/Y') }}
                                    </span>
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>

                            </a>
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

</div>
