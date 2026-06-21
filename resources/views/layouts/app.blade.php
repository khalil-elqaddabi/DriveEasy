<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DriveEasy') }}</title>

    <!-- Plus Jakarta Sans Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --de-ink: #1e1b2e;
            --de-muted: #64748b;
            --de-violet: #7c3aed;
            --de-blue: #2563eb;
            --de-cyan: #06b6d4;
            --de-emerald: #10b981;
            --de-teal: #14b8a6;
            --de-rose: #f43f5e;
            --de-red: #ef4444;
            --de-amber: #f59e0b;
            --de-orange: #f97316;
            --de-border: #e2e4e8;
        }

        body {
            font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            background-color: #f8fafc;
            color: var(--de-ink);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--de-violet), var(--de-blue));
            border-radius: 50px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
    </style>
</head>

<body class="antialiased">

    <div class="min-h-screen flex flex-col">

        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Header --}}
        @isset($header)

            <header class="relative overflow-hidden mb-8">

                <div class="absolute inset-0 bg-gradient-to-r from-[#7c3aed] via-[#2563eb] to-[#06b6d4]"></div>

                <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-white/10 blur-[80px]"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-white/10 blur-[80px]"></div>

                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">

                    <div class="bg-white/10 backdrop-blur-md rounded-[1.5rem] border border-white/20 shadow-[0_20px_40px_-20px_rgba(0,0,0,0.3)] p-6 sm:p-8 lg:p-10 transition-all">

                        <div class="text-white">
                            {{ $header }}
                        </div>

                    </div>

                </div>

            </header>

        @endisset

        {{-- Main --}}
        <main class="flex-1 w-full">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
                {{ $slot }}
            </div>

        </main>

        {{-- Footer --}}
        <footer class="bg-[#1e1b2e] text-white mt-auto border-t border-white/10 shadow-[0_-10px_40px_-10px_rgba(15,23,42,0.5)]">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">

                <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                    <div class="text-center md:text-left">
                        <h2 class="text-2xl font-extrabold tracking-tight flex items-center justify-center md:justify-start gap-2">
                            <svg class="w-6 h-6 text-[#06b6d4]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                                <circle cx="7" cy="17" r="2"/>
                                <path d="M9 17h6"/>
                                <circle cx="17" cy="17" r="2"/>
                            </svg>
                            DriveEasy
                        </h2>
                        <p class="text-slate-400 mt-2 font-medium">Premium Car Rental Platform</p>
                    </div>

                    <div class="text-slate-400 text-sm font-medium">
                        © {{ date('Y') }} DriveEasy. All rights reserved.
                    </div>

                </div>

            </div>

        </footer>

    </div>

</body>

</html>
