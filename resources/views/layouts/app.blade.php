<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MLP To-Do</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased flex flex-col min-h-screen justify-between bg-gray-100">
        <div id="app">
            <header>
                <div class="max-w-screen-xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <a href="/">
                        <x-logo />
                    </a>
                    <div class="cursor-pointer uppercase">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <strong>{{ __('Log Out') }}</strong>
                            </a>
                        </form>
                    </div>
                </div>
            </header>

            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-gray-100 h-10 mt-auto">
            <span class="block w-full text-center">Copyright &copy; 2020 All Rights Reserved.</span>
        </footer>
        @livewireScripts
    </body>
</html>
