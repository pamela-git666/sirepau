<x-app-layout>
     <div class="max-w-5xl flex bg-white rounded-lg shadow-lg mx-auto px-4 py-2 sm:px-6 lg:px-8 m-2">
        <span class="font-bold text-blue-500 mr-3 m-2">Información de las Entidades:</span>
        <span class="font-semibold m-2">{{$ritu->nombre}}</span>
        <a type="button" href="{{ route('ritu.index', $ritu->tramite) }}"
            class="ml-auto text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 mx-3 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 m-2"><i class="fa-solid fa-arrow-left mr-1"></i>Volver</a>
     </div>
     @livewire('entidades.show-abt', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-ae', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-ajam', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-anh', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-ine', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-inra', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-sernap', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-vicemintierra', ['ritu' => $ritu], key($ritu->id))

     @livewire('entidades.show-viceminviv', ['ritu' => $ritu], key($ritu->id))
 </x-app-layout>