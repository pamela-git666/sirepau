<x-guest-layout>
    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"    style="background-image: url(' {{asset('img/autonomias.png')}} ') " id="modal_overlay" velue="1">

    <x-jet-authentication-card>
        
        <x-slot name="logo">
            
            <x-jet-authentication-card-logo />
           
        </x-slot>
        
        
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label  for="email" value="{{ __('CORREO ELECTRÓNICO') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label style="color: rgb(1, 51, 1) font-bold" for="password" value="{{ __('CONTRASEÑA') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <b><label for="remember_me" class="flex items-center"></b>
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-blue-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }} 
                    </a>
                    
                @endif
                
                <button class="ml-4 bg-blue-600 hover:bg-red-400 text-white font-bold py-2 px-5 border-b-2 border-green-700 hover:border-red-500 rounded">
                    <h1 style="color: aliceblue"> {{ __('ACCEDER') }}</h1>
                </button>
                
            </div>
        </form>
    </x-jet-authentication-card>
</div>

</x-guest-layout>