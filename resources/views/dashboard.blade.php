<x-app-layout>
    
    <div class="w-full py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @hasanyrole('ejecutivo|operativo')
              @livewire('admin.buscador-centro-poblado')
            @endhasanyrole
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full p-3">
                <img class="w-full" src="{{ asset('img/dashboard.png') }}" alt="">
            </div>
        </div>
    </div>

   @push('script')
   <script>
       var alert_del = document.querySelectorAll('alert-del');

       alert_del.forEach((x) => {
         x.addEventListener('click',() =>
           x.parentElement.classList.add('hidden')
         );
       });
   </script>
   @endpush
</x-app-layout>
