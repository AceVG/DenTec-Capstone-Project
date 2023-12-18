<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
        @vite(['resources/sass/guest.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%); z-index: 1;">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
            <div class="fixed top-0 left-0 mt-4 ml-4">
                <a href="{{ url('/') }}">Go to Main Page</a>
            </div>
            <div class="w-full sm:max-w-xl my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="z-index: 2;">
                <h1 class="text-teal-500 text-center text-3xl mb-4"><i class="fa fa-tooth me-2"></i>DenTec</h1>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
