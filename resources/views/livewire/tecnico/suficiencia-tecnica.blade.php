<div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">

        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-4 flex items-center">
            <div class="relative">
                <div
                    class="{{ $tramite->status >= 1 && $tramite->status != 6 ? 'bg-red-500' : 'bg-gray-400' }}  rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-import text-white"></i>
                </div>

                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">Inicio</p>
                </div>
            </div>

            <div
                class="{{ $tramite->status >= 2 && $tramite->status != 6 ? 'bg-red-500' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>

            <div class="relative">

                <div
                    class="{{ $tramite->status >= 2 && $tramite->status != 6 ? 'bg-red-500' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-pen text-white"></i><br>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p class="font-semibold">Admisión</p>
                </div>
            </div>

            <div
                class="{{ $tramite->status >= 3 && $tramite->status != 6 ? 'bg-yellow-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>

            <div class="relative">
                <div
                    class="{{ $tramite->status >= 3 && $tramite->status != 6 ? 'bg-yellow-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-circle-question text-white"></i>
                </div>

                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">A.S.T.</p>
                </div>
            </div>
            <div
                class="{{ $tramite->status >= 4 && $tramite->status != 6 ? 'bg-yellow-400' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>

            <div class="relative">

                <div
                    class="{{ $tramite->status >= 4 && $tramite->status != 6 ? 'bg-yellow-400' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center mt-1">
                    <i class="fa-solid fa-gavel text-white"></i>
                </div>
                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">A.C.L.</p>

                </div>
            </div>
            <div
                class="{{ $tramite->status >= 5 && $tramite->status != 6 ? 'bg-green-500' : 'bg-gray-400' }} h-2 flex-1 mx-1">
            </div>
            <div class="relative">
                <div
                    class="{{ $tramite->status >= 5 && $tramite->status != 6 ? 'bg-green-500' : 'bg-gray-400' }} rounded-full h-14 w-14 flex items-center justify-center">
                    <i class="fa-solid fa-file-circle-check text-white"></i>
                </div>

                <div class="absolute -center ml-2 mt-0.5">
                    <p class="font-semibold">H.A.U.</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-12 py-4 mb-4 items-center w-auto">
            <a type="button" href="{{ route('admin.tramites.show', $tramite) }}"
                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                    class="fa-solid fa-file-contract mr-2"></i>Resumen</a>
            <a type="button" href="{{ route('inicio.index', $tramite) }}"
                class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                    class="fa-solid fa-file-import text-white mr-2"></i>Inf. Base</a>

            <a type="button" href="{{ route('ritu.index', $tramite) }}"
                class="focus:outline-none text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                    class="fa-solid fa-file-pen text-white mr-2"></i>Admisión</a>
            <a type="button" href="{{ route('ast.index', $tramite) }}"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa-solid fa-file-circle-question text-white mr-2"></i>A. S. T.</a>
            <button type="button"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"><i
                    class="fa-solid fa-file-circle-check text-white mr-2"></i> A.C.L.</button>
            <button type="button"
                class="focus:outline-none text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-sm px-5 ml-3 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><i
                    class="fa-solid fa-file-circle-check text-white"></i> H.A.U.</button>

        </div>
    </div>
  
</div>
