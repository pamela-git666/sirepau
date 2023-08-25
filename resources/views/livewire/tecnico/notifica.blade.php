<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-notificacion color="white" size="28" />
                @if ($num)
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ $num }}</span>
                @else
                    <span
                        class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif

                {{-- <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span> --}}
            </span>
        </x-slot>

        <x-slot name="content">
            @if ($mensajes)
                <div class="py-4 px-4">
                    @foreach ($mensajes as $item)
                        @if ($item->mensaje == 1)
                            @if ($item->status == 1)
                                <div class="flex p-2 mb-2 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Un trámite nuevo fue asignado: <a class="font-bold"
                                                href="{{ route('admin.tramites.status', $item) }}">Ver
                                                más...</a></span>
                                        <div>
                                            <span class="text-xs">{{ $item->created_at->format('d/m/Y') }}
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('H:mm') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex p-2 mb-2 text-sm text-blue-700 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Un trámite nuevo fue asignado: <a class="font-bold"
                                                href="{{ route('admin.tramites.status', $item) }}">Ver
                                                más...</a></span>
                                        <div>
                                            <span class="text-xs">{{ $item->created_at->format('d/m/Y') }}
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('H:mm') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            @if ($item->status == 1)
                                <div class="flex p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Danger</span>
                                    <div>
                                        <span class="font-medium">Un trámite esta en fuera de plazo: <a
                                                class="font-bold" href="">Ver más...</a></span>
                                        <div>
                                            <span class="text-xs">{{ $item->created_at->format('d/m/Y') }}
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('H:mm') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex p-2 mb-2 text-sm text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Danger</span>
                                    <div>
                                        <span class="font-medium">Un trámite esta en fuera de plazo: <a
                                                class="font-bold" href="">Ver más...</a></span>
                                        <div>
                                            <span class="text-xs">{{ $item->created_at->format('d/m/Y') }}
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('H:mm') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    <div class="px-4">
                        <a href="{{ route('notificacion.index',Auth::user())}}"><span class="text-blue-600 font-bold">Ver todas las
                                notificaciones....</span></a>
                    </div>
                </div>
            @else
                <div class="px-4 py-6">
                    No tiene mensajes
                </div>
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
