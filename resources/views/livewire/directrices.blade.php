<div class="container my-6  px-6 mx-auto">
    <!-- Section: Design Block -->
    <section class="mb-12 text-gray-800 py-4">
        <style>
            .map-container-2 {
                height: 400px;
            }
        </style>
        <div class="block rounded-lg shadow-lg bg-white">
            <div class="flex flex-wrap items-center">
                <div class="grow-0 shrink-0 basis-auto block w-full lg:flex lg:w-6/12 xl:w-4/12">
                    <div class="map-container-2 w-full">
                        <img class="left-0 top-0 h-full w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg"
                            src="{{ asset('img/sirepau.jpeg') }}" alt="">
                    </div>
                </div>
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-8/12">
                    <div class="text-center p-2"><span class=" font-bold text-blue-600 text-xl">DIRECTRICES</span></div>
                    <div class="flex flex-wrap pt-12 lg:pt-0">
                        <div
                            class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
                            <div class="flex items-start">
                                <div class="shrink-0">
                                    <div
                                        class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                        <i class="fa-solid fa-file-lines text-white text-xl animate-bounce"></i>
                                    </div>
                                </div>
                                <div class="grow ml-6">
                                    <p class="font-bold">NORMATIVA VIGENTE</p>

                                    <x-button-enlace class="bg-green-600 ml-auto cursor-pointer"
                                        wire:click="$set('open_normativa',true)">
                                        <i class="fas fa-eye mr-2"></i> Ver Documentos
                                    </x-button-enlace>
                                </div>
                            </div>
                        </div>


                        <div
                            class="mb-12 lg:mb-0 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
                            <div class="flex align-start">
                                <div class="shrink-0">
                                    <div
                                        class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                        <i class="fa-solid fa-file-lines text-white text-xl animate-bounce"></i>
                                    </div>
                                </div>
                                <div class="grow ml-6">
                                    <p class="font-bold mb-1">CARTAS ORGÁNICAS</p>
                                    <x-button-enlace class="bg-green-600 ml-auto cursor-pointer"
                                        wire:click="$set('open_carta',true)">
                                        <i class="fas fa-eye mr-2"></i> Ver Documentos
                                    </x-button-enlace>
                                </div>
                            </div>
                        </div>



                        <div
                            class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
                            <div class="flex items-start">
                                <div class="shrink-0">
                                    <div
                                        class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                        <i class="fa-solid fa-gavel text-white text-xl animate-bounce"></i>
                                    </div>
                                </div>
                                <div class="grow ml-6">
                                    <p class="font-bold">LÍMITES INTERDEPARTAMENTALES</p>

                                    <x-button-enlace class="bg-green-600 ml-auto cursor-pointer"
                                        wire:click="$set('open_limite',true)">
                                        <i class="fas fa-eye mr-2"></i> Ver Documentos
                                    </x-button-enlace>
                                </div>
                            </div>
                        </div>

                        <div
                            class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
                            <div class="flex align-start">
                                <div class="shrink-0">
                                    <div
                                        class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                        <i class="fa-solid fa-gavel text-white text-xl animate-bounce"></i>
                                    </div>
                                </div>
                                <div class="grow ml-6">
                                    <p class="font-bold">CONVENIOS Y ACUERDOS</p>

                                    <x-button-enlace class="bg-green-600 ml-auto cursor-pointer"
                                        wire:click="$set('open_convenio',true)">
                                        <i class="fas fa-eye mr-2"></i> Ver Documentos
                                    </x-button-enlace>
                                </div>
                            </div>
                        </div>

                        <div
                            class="mb-12 grow-0 shrink-0 basis-auto w-full md:w-6/12 lg:w-full xl:w-6/12 px-3 md:px-6 xl:px-12">
                            <div class="flex items-start">
                                <div class="shrink-0">
                                    <div
                                        class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                        <i class="fa-solid fa-file-lines text-white text-xl animate-bounce"></i>
                                    </div>
                                </div>
                                <div class="grow ml-6">
                                    <p class="font-bold">GUÍAS</p>

                                    <x-button-enlace class="bg-green-600 ml-auto cursor-pointer"
                                        wire:click="$set('open_guia',true)">
                                        <i class="fas fa-eye mr-2"></i> Ver Documentos
                                    </x-button-enlace>
                                </div>
                            </div>
                        </div>

                        {{-- --}}
                        {{-- --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: Design Block -->

    {{-- MoDAL Normativa --}}

    <x-modal-simple wire:model="open_normativa">
        <x-slot name="title">
            <div>
                <span class="font-semibold text-2xl text-blue-600">NORMATIVA VIGENTE</span>
            </div>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open_normativa', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="bg-white p-3">
                <ul class="list-disc px-6">
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/cp.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CONSTITUCIÓN POLÍTICA DEL ESTADO</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/re.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY DEL RÉGIMEN ELECTORAL</span>
                        </a>

                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/31.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 31 - LEY MARCO DE AUTONOMÍAS Y
                                DESCENTRALIZACIÓN "ANDRÉS IBÁÑEZ"</span>
                        </a>

                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/247.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 247 - LEY DE REGULARIZACIÓN DEL DERECHO
                                PROPIETARIO SOBRE BIENES INMUEBLES URBANOS DESTINADOS A VIVIENDA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/254.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 254 - CODIGO PROCESAL
                                CONSTITUCIONAL</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/466.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 466 - LEY DE LA EMPRESA PÚBLICA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/492.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 492 - LEY DE ACUERDOS Y CONVENIOS
                                INTERGUBERNATIVOS</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/699.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 699 - LEY BÁSICA DE RELACIONAMIENTO
                                INTERNACIONAL DE LAS ENTIDADES TERRITORIALES AUTÓNOMAS</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/730.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 730</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/924.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 924 - LEY DE MODIFICACIÓN A LA LEY MARCO
                                DE AUTONOMÍAS Y DESCENTRALIZACIÓN "ANDRÉS IBÁÑEZ"</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/3525.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 3525 - DE REGULACIÓN Y PROMOCIÓN DE LA
                                PRODUCCIÓN AGROPECUARIA Y FORESTAL NO MADERABLE ECOLÓGICA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/normativa/482.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">LEY 482 - LEY DE GOBIERNOS AUTÓNOMOS
                                MUNICIPALES</span>
                        </a>
                    </li>
                </ul>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_normativa',false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>

    </x-modal-simple>
    {{-- Fin Modal --}}
    {{-- Modal Carta Orgánica --}}
    <x-modal-simple wire:model="open_carta">
        <x-slot name="title">
            <div>
                <span class="font-semibold text-2xl text-blue-600">CARTAS ORGÁNICAS</span>
            </div>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open_carta', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="bg-white p-3">
                <ul class="list-disc px-6">
                    <li class="mb-4">
                        <a href="#" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2"> CARTA ORGÁNICA ACHOCALLA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA ALCALA REACO</span>
                        </a>

                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/alto_beni.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA ALTO BENI</span>
                        </a>

                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/arque.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA ARQUE</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/buena_vista.pdf') }}" target="blaclearnk">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA BUENA VISTA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/cajuata.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA CAJUATA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/mizque.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA MIZQUE</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/puerto_quijarro.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA PUERTO QUIJARRO</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/carta_organica/san_lucas.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">CARTA ORGÁNICA SAN LUCAS</span>
                        </a>
                    </li>
                </ul>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_carta',false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>

    </x-modal-simple>
    {{-- Fin Modal Carta Orgánica --}}
    {{-- Modal Limites --}}
    <x-modal-simple wire:model="open_limite">
        <x-slot name="title">
            <div>
                <span class="font-semibold text-2xl text-blue-600">LÍMITE INTERDEPARTAMENTALES</span>
            </div>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open_limite', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="bg-white p-3">
                <ul class="list-disc px-6">
                    <li class="mb-4">
                        <a href="{{ asset('doc/limites/tarija.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">ESTATUTO TARIJA</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/limites/pando.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">ESTATUTO PANDO</span>
                        </a>

                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/limites/santa_cruz.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">ESTATUTO SANTA CRUZ</span>
                        </a>

                    </li>

                </ul>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_limite',false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>

    </x-modal-simple>
    {{-- Fin Modal Limites --}}
    {{-- Modal Convenios --}}
    <x-modal-simple wire:model="open_convenio">
        <x-slot name="title">
            <div>
                <span class="font-semibold text-2xl text-blue-600">CONVENIOS Y ACUERDOS</span>
            </div>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open_convenio', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="bg-white p-3">
                <ul class="list-disc px-6">
                    <li class="mb-4">
                        <a href="{{ asset('doc/guia/guia_convenio_acuerdo.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">GUÍA DE CONVENIOS Y ACUERDOS</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div>
                <span class="font-bold text-blue-600 mr-3">RESULTADOS</span>
            </div>

            <div class="bg-white p-3">
                <ul class="list-disc px-6">
                    <li class="mb-4">
                        <a href="{{ asset('doc/resolucion.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">RESULTADOS REFERENDO</span>
                        </a>
                    </li>

                </ul>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_limite',false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>

    </x-modal-simple>
    {{-- Fin Modal Convenios --}}
    {{-- Guia de Delimitacion --}}
    <x-modal-simple wire:model="open_guia">
        <x-slot name="title">
            <div>
                <span class="font-semibold text-2xl text-blue-600">GUÍA TÉCNICA PARA LA DELIMITACIÓN Y HOMOLOGACIÓN DE ÁREAS URBANAS</span>
            </div>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="extralarge-modal" wire:click="$set('open_guia', false)">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="bg-white p-3">
                <ul class="list-disc px-6">
                    <li class="mb-4">
                        <a href="{{ asset('doc/guia_2021.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">GUÍA TÉCNICA 2021</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ asset('doc/guia_2019.pdf') }}" target="blank">
                            <i class="far fa-file-pdf text-2xl text-red-600"></i><span
                                class="font-semibold text-gray-700 px-2">GUÍA TÉCNICA 2019</span>
                        </a>
                    </li>
                </ul>
            </div>
           
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_limite',false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>

    </x-modal-simple>
    {{-- Fin de Guia de Delimitacion --}}
</div>
