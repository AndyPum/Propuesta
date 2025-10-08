<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>APP</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <link id="pagestyle" href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

        @stack('styles')
        @livewireStyles

    </head>

    <body class="bg-dark body--with-sidebar">

        <x-layouts.app.header :title="$title ?? null">
        </x-layouts.app.header>
        <main class="main-content p-2">
            <div class="container-fluid flex-grow-1 ">
                {{ $slot }}
            </div>
        </main>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        


    </body>

</html>
