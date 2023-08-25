<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    {{-- Font Awesone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
<div id = "fb-root" ></div> <script async defer crossorigin = "anónimo" src = "https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0" nonce = "t6jUhJNj" ></script> 
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100 ">
        @stack('css')
        @livewire('navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Slider main container -->
        <div class="swiper w-full mb-6">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper h-screen">
                <!-- Slides -->
                <div class="swiper-slide"><img class="object-cover object-center w-full"
                        src="{{ asset('img/1.jpeg') }}" alt="" style="height: 500px"></div>
                <div class="swiper-slide"><img class="object-cover object-center w-full" style="height: 500px"
                        src="{{ asset('img/2.jpeg') }}" alt=""></div>
                <div class="swiper-slide"><img class="object-cover object-center w-full" style="height: 500px"
                        src="{{ asset('img/3.jpeg') }}" alt=""></div>

                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="container my-3  px-6 mx-auto">
            @livewire('buscador-centro-poblado')
        </div>       
   
        @livewire('directrices')

        <div class="container px-6 mb-4">
            <div class="bg-white shadow-lg rounded-lg px-8 py-4 text-gray-700 grid lg:grid-cols-2">
                <div class="mx-12">
                    <div class="fb-page" data-href="https://www.facebook.com/MinPresidencia" data-tabs="timeline" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MinPresidencia" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MinPresidencia">Ministerio de la Presidencia - Bolivia</a></blockquote></div>
                </div>
                <div class="mx-10">
                    <div class="fb-page" data-href="https://www.facebook.com/ViceAutonomiasBol" data-tabs="timeline" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ViceAutonomiasBol" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ViceAutonomiasBol">Viceministerio de Autonomías Bolivia</a></blockquote></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gray-100 text-center lg:text-left ">
        <div class="container p-6 ">
            <div class="grid lg:grid-cols-3 md:grid-cols-1">
                <div class="mb-6">
                    <h5 class="capitalize font-bold mb-2.5 text-blue-600 text-xl">Dirección</h5>

                    <ul class="list-none mb-0">
                        <li>
                            <p class="font-bold uppercase mb-2"><i class="fas fa-map-marker-alt"></i> CASA GRANDE DEL
                                PUEBLO</p>
                        </li>
                        <li>
                            <p class="font-semibold mb-2">Zona Central - Calle Ayacucho Esq. Potosí</p>
                        </li>
                        <li>
                            <p class="font-semibold">La Paz - Bolivia</p>
                        </li>

                    </ul>
                </div>

                <div class="mb-6">
                    <h5 class="capitalize font-bold mb-2.5 text-blue-600 text-xl">Contactos</h5>
                    <ul class="list-none mb-0">
                        <li>
                            <p class="mb-2"><span class="font-semibold"><i class="fas fa-envelope"></i>
                                    Email:</span> viceministerio@gmail.com</p>
                        </li>
                        <li>
                            <p class="mb-2"><span class="font-semibold"><i class="fas fa-phone-alt"></i>
                                    Telefono:</span> (591-2) 2153845</p>
                        </li>
                        <li>
                            <p class="mb-2"><span class="font-semibold"><i class="fas fa-fax"></i> Fax:</span>
                                2153931</p>
                        </li>

                    </ul>

                </div>

                <div class="mb-6">
                    <h5 class="capitalize font-bold mb-2.5 text-blue-600 text-xl">Síguenos</h5>

                    <ul class="list-none mb-0">
                        <li>
                            <a href="#!" class="text-gray-800 font-semibold"><i
                                    class="text-blue-600 fab fa-facebook-square text-2xl"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#!" class="text-gray-800 font-semibold"><i
                                    class="text-blue-400 fab fa-twitter text-2xl"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="#!" class="text-gray-800 font-semibold"><i
                                    class="text-red-600 fab fa-youtube text-2xl"></i> Youtube</a>
                        </li>
                        <li>
                            <a href="#!" class="text-gray-800 font-semibold"><i
                                    class="text-red-600 fab fa-instagram text-2xl"></i> Instagram</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="bg-blue-900 text-white text-center p-4">
            © 2022 Copyright
            <a class="text-white" href="#"> Viceministerio de Autonomías</a>
        </div>
    </footer>

    @stack('modals')

    @livewireScripts

    @stack('script')
    <script>
        var alert_del = document.querySelectorAll('alert-del');

        alert_del.forEach((x) => {
            x.addEventListener('click', () =>
                x.parentElement.classList.add('hidden')
            );
        });
    </script>
    <script>
        const swiper = new Swiper('.swiper', {
            speed: 400,
            spaceBetween: 100,
            autoplay: {
                delay: 3000,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>

</body>

</html>
