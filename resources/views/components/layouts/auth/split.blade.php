<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-white antialiased" style="background-color: #4E342E">
        <div class="relative flex h-dvh w-full">
            <!-- Imagen de fondo (izquierda) -->
            <div class="hidden lg:flex relative h-full items-center" style="width: 45%; background-image: url('{{ asset('assets/img/fondo.jpg') }}'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-neutral-900/50"></div> <!-- overlay semi-transparente -->

                <div class="relative z-20 w-full text-center">
                    <x-app-logo-icon class="mx-auto flex" />
                </div>
            </div>

            <!-- Contenido (derecha) -->
            <div class="w-full lg:w-[67%] flex items-center justify-center p-8">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>
                        <span class="sr-only">El Alboroto</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>

        @fluxScripts
    </body>

</html>
