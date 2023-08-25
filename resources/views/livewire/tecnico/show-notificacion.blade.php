<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notificaciones') }}
            </h2>
        </div>
    </x-slot>

    <div class="container py-12">
        <x-table-responsive>

            @if ($mensajes->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-600">
                        <tr scope="col"
                            class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Fecha
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Hora
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Mensaje
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Acciones
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-400">

                        @foreach ($mensajes as $item)
                            <tr>
                                <td class="px-2 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->created_at->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4 ">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('H:mm') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                @switch($item->mensaje)
                                                    @case(1)
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-200 text-blue-800">
                                                            Trámite nuevo
                                                        </span>
                                                    @break

                                                    @case(2)
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                                            Alerta de vencimiento de plazo.
                                                        </span>
                                                    @break
                                                    @default
                                                @endswitch
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4   text-sm font-medium whitespace-nowrap">
                                    <div class="inline-flex rounded-md shadow-sm">
                                        <a href="#" class="btn btn-red cursor-pointer"
                                        wire:click="$emit('deleteMensaje',{{ $item->id }})">
                                        <i class="fa-solid fa-trash-can"></i> Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4 bg-white font-bold">
                    No tiene Notificaciones
                </div>
            @endif

            @if ($mensajes->hasPages())
                <div class="px-6 py-4">
                    {{ $mensajes->links() }}
                </div>
            @endif

        </x-table-responsive>
    </div>
    
@push('script')
    <script src="sweetalert2.all.min.js"></script>

    <script>
        Livewire.on('deleteMensaje', mensajeId => {
            Swal.fire({
                title: 'Estas seguro de eliminar la notificación?',

                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('tecnico.show-notificacion', 'delete', mensajeId);

                    Swal.fire(
                        'Eliminado!',
                        'La notificación fue eliminada.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
</div>

