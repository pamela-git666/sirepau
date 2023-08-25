<x-app-layout>
    <div class="max-w-5xl  mx-auto px-2 sm:px-6 lg:px-4 pt-10">

        @livewire('tecnico.status-tramite', ['tramite' => $tramite])

        <div class="max-w-5xl bg-white rounded-lg shadow-lg mx-auto px-4 py-2 sm:px-6 lg:px-8 mt-3">
            <div class="px-6 py-1.5 font-bold text-red-600 text-lg">
                ETAPA: <span class="text-gray-900">ANÁLISIS</span>
             </div>
            @hasrole('responsable')
                <a type="button" href="{{ route('responsable.tramite.index', $tramite) }}"
                    class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-file-contract mr-1"></i>Resumen</a>
            @else
                <a type="button" href="{{ route('admin.tramites.show', $tramite) }}"
                    class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-file-contract mr-1"></i>Resumen</a>
            @endhasrole
            <a type="button" href="{{ route('resadmin.index', $tramite) }}"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
                    class="fa-solid fa-file-circle-question text-white mr-1"></i>Resolución Administrativa</a>
            <a type="button" href="{{ route('ast.index', $tramite) }}"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
                    class="fa-solid fa-file-circle-question text-white mr-1"></i>A. S. T.</a>
            <a type="button" href="{{ route('acl.index', $tramite) }}"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"><i
                    class="fa-solid fa-file-circle-check text-white mr-1"></i> A.C.L.</a>
            <a type="button" href="{{ route('homologacion.index', $tramite) }}"
                class="focus:outline-none text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-5 ml-3 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><i
                    class="fa-solid fa-file-circle-check text-white"></i> H.A.U.</a>
        </div>
        @if ($tramite->fase > 2)
            @livewire('tecnico.show-ast', ['tramite' => $tramite], key($tramite->id))
            @livewire('tecnico.show-ley-limitacion', ['tramite' => $tramite], key($tramite->id))
        @else
            <div class="flex bg-white rounded-lg shadow-lg px-12 py-4 mb-4 items-center w-auto">
                <div class="mr-3">
                    <span class="flex animate-bounce  items-center justify-center h-10 w-10 rounded-full bg-red-500">
                        <i class="fa-solid fa-hand text-white"></i>
                    </span>

                </div>
                <div class="text-blue-600">
                    <span class="font-bold text-lg text-blue-500">
                        No se encuentra habilitada la etapa de Análisis de Suficiencia Técnica.
                    </span>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
