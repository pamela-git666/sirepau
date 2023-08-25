<x-app-layout>
    <div class="container py-6">

        <section class="grid lg:grid-cols-4 gap-6 text-white">

            <a href="{{ route('admin.tramites.index') . '?status=1' }}"
                class="bg-red-500 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $pre }}
                </p>
                <p class="uppercase text-center font-bold">PREPARATORIA</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fa-solid fa-file-import"></i>
                </p>
            </a>

            <a href="{{ route('admin.tramites.index') . '?status=2' }}"
                class="bg-yellow-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $ini }}
                </p>
                <p class="uppercase text-center font-bold">INICIO</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fa-solid fa-file-pen"></i>
                </p>
            </a>

            <a href="{{ route('admin.tramites.index') . '?status=3' }}"
                class="bg-green-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $ana }}
                </p>
                <p class="uppercase text-center font-bold">ANÁLISIS</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fa-solid fa-file-circle-question"></i>
                </p>
            </a>

            <a href="{{ route('admin.tramites.index') . '?status=4' }}"
                class="bg-green-400 bg-opacity-75 rounded-lg px-8 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $emi }}
                </p>
                <p class="uppercase text-center font-bold">EMISIÓN DE RESOLUCIÓN</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fa-solid fa-gavel"></i>
                </p>
            </a>

            
        </section>

        @livewire('tecnico.buscador-centro-poblado')

        @if ($tramites != 'NULL')
            <section class="bg-white shadow-lg rounded-lg px-8 py-4 mt-6 text-gray-700">
                <h1 class="text-2xl mb-4">Filtro por Etapa de Trámite</h1>
                <ul>
                    @foreach ($tramites as $tramite)
                        <li>
                            <a href="{{ route('admin.tramites.show', $tramite) }}"
                                class="flex items-center py-2 px-4 hover:bg-gray-100">
                                <span class="w-12 text-center">
                                    @switch($tramite->fase)
                                        @case(1)
                                            <i class="fa-solid fa-file-import text-xl text-red-500"></i>
                                        @break

                                        @case(2)
                                            <i class="fa-solid fa-file-pen text-xl text-yellow-500"></i>
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
                                                Status: <span class="font-bold text-red-500">Preparatoria</span>
                                            @break

                                            @case(2)
                                                Status: <span class="font-bold text-yellow-500"> Inicio </span>
                                            @break

                                            @case(3)
                                                Status: <span class="font-bold text-green-500"> Análisis
                                                </span>
                                            @break

                                            @case(4)
                                                Status: <span class="font-bold text-green-500"> Emisión de Resolución
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

        @endif

    </div>
</x-app-layout>
