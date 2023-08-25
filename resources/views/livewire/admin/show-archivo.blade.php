<div>
    <x-slot name="header">
        <div class="flex items-center  mt-12">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Especialista') }}
            </h2>
            <div class="ml-auto">
                @livewire('admin.create-archivo')
            </div>
        </div>
    </x-slot>

    <div class="container py-12">

        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input type="text" wire:model="search" class="w-full"
                    placeholder="Ingrese el nombre del autor que quiere buscar" />

            </div>

            @if ($archivos->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>


                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($archivos as $archivo)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <iframe type="aplication/pdf" class="m-auto"
                                                src="{{ Storage::url($archivo->archivo) }}" alt="">
                                            </iframe>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $archivo->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    <div class="inline-flex rounded-md shadow-sm">
                                        <a href="#" class="btn btn-blue cursor-pointer mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-red cursor-pointer mr-2">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                        @livewire('admin.show-doc', ['archivo' => $archivo], key($archivo->id))
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($archivos->hasPages())
                <div class="px-6 py-4">
                    {{ $archivos->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
</div>
