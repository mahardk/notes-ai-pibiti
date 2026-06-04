<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('theme') === 'dark' }" :class="{ 'dark': dark }" x-init="$watch('dark', val => localStorage.setItem('theme', val ? 'dark' : 'light'))">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            @laravelPWA
        @endif
    </head>
    <body class="bg-slate-100 dark:bg-slate-900 transition-colors duration-300">
        <div class="flex min-h-screen">
            <aside class="hidden md:flex flex-col w-64 bg-slate-800 dark:bg-slate-950 text-white p-6" id="aside">
                <h1 class="text-xl font-bold mb-8">Smart Notes AI</h1>
                <nav class="space-y-2">
                    <a href="/" class="block px-3 py-2 rounded-lg hover:bg-slate-700 transition">Dashboard</a>
                    <a href="/notes" class="block px-3 py-2 rounded-lg hover:bg-slate-700 transition">Notes</a>
                    <a href="/quiz" class="block px-3 py-2 rounded-lg hover:bg-slate-700 transition">Quiz</a>
                </nav>
            </aside>

            <main class="flex-1">
                <header class="bg-white dark:bg-slate-800 border-b dark:border-slate-700 px-6 py-4 flex justify-between items-center">
                    <div class="flex gap-3 items-center">
                        <button class="md:hidden" id="menu-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 dark:stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                        <h2 class="font-semibold dark:text-white">Smart Notes AI</h2>
                    </div>

                    <div class="flex items-center gap-4">
                        {{-- Dark Mode Toggle --}}
                        <button @click="dark = !dark" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition" title="Toggle Dark Mode">
                            <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                            </svg>
                            <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                        </button>

                        <span class="text-sm dark:text-slate-300">Hello, {{ session('username') }}</span>

                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
                        </form>
                    </div>
                </header>

                <div class="p-6">
                    @yield('content')
                </div>
            </main>
        </div>

        <script>
            // Mobile sidebar toggle
            document.getElementById('menu-button')?.addEventListener('click', () => {
                document.getElementById('aside')?.classList.toggle('hidden');
            });
        </script>
    </body>
</html>