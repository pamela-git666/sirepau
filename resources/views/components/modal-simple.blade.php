@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    
      
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        {{ $title }}
                </div>
                <!-- Modal body -->
                <div class="p-2 space-y-6">
                    {{ $content }}
                </div>
                <!-- Modal footer -->
                
            </div>
   
</x-modal>