<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
            <div id="cookies-with-stacked-buttons" class="fixed bottom-0 end-0 z-[60] sm:max-w-sm w-full mx-auto p-6">
                <!-- Card -->
                <div
                    class="p-4 bg-white/60 backdrop-blur-lg rounded-xl shadow-2xl dark:bg-neutral-900/60 dark:shadow-black/70">
                    <div class="flex justify-between items-center gap-x-5 sm:gap-x-10">
                        <h2 class="font-semibold text-gray-800 dark:text-white">
                            Cookie Settings
                        </h2>
                        <button type="button"
                            class="inline-flex rounded-full p-2 text-gray-500 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-gray-600 dark:hover:bg-neutral-800 dark:text-neutral-300"
                            data-hs-remove-element="#cookies-with-stacked-buttons">
                            <span class="sr-only">Dismiss</span>
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mt-2 text-sm text-gray-800 dark:text-neutral-200">
                        We use cookies to improve your experience and for marketing. Visit our <a
                            class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium dark:text-blue-500"
                            href="#">Cookies Policy</a> to learn more.
                    </p>
                    <div class="mt-5 mb-2 w-full flex gap-x-2">
                        <div class="grid w-full">
                            <button type="button"
                                class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Allow all
                            </button>
                        </div>
                        <div class="grid w-full">
                            <button type="button"
                                class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Reject all
                            </button>
                        </div>
                    </div>
                    <div class="grid w-full">
                        <button type="button"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                            Manage cookies
                        </button>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <svg class="absolute bottom-0 end-0 -z-[1]' width="273" height="250" viewBox="0 0 273 250" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1727_230)">
                    <path
                        d="M274.983 42.5186C261.682 42.5186 248.926 47.8596 239.521 57.3668C230.116 66.874 224.833 79.7685 224.833 93.2137C224.833 106.659 230.116 119.553 239.521 129.061C248.926 138.568 261.682 143.909 274.983 143.909L274.983 120.374C267.857 120.374 261.023 117.512 255.984 112.419C250.945 107.325 248.114 100.417 248.114 93.2137C248.114 86.0103 250.945 79.1021 255.984 74.0085C261.023 68.915 267.857 66.0535 274.983 66.0535L274.983 42.5186Z"
                        fill="#3B82F6" />
                    <path
                        d="M274.982 0C250.405 -2.94804e-07 226.835 9.82069 209.456 27.3016C192.077 44.7826 182.314 68.4918 182.314 93.2136C182.314 117.935 192.077 141.645 209.456 159.126C226.835 176.606 250.405 186.427 274.982 186.427L274.982 143.153C261.815 143.153 249.187 137.892 239.876 128.526C230.566 119.161 225.335 106.458 225.335 93.2136C225.335 79.9688 230.566 67.2664 239.876 57.9009C249.187 48.5354 261.815 43.274 274.982 43.274L274.982 0Z"
                        fill="#1D4ED8" />
                    <circle cx="214.475" cy="222.95" r="59.962" transform="rotate(180 214.475 222.95)"
                        stroke="#1E40AF" stroke-width="3.27065" />
                    <circle cx="214.476" cy="222.95" r="49.0598" transform="rotate(180 214.476 222.95)"
                        stroke="#1E40AF" stroke-width="3.27065" />
                    <circle cx="214.475" cy="222.95" r="39.2478" transform="rotate(180 214.475 222.95)"
                        stroke="#1E40AF" stroke-width="3.27065" />
                    <circle cx="214.476" cy="222.949" r="28.3457" transform="rotate(180 214.476 222.949)"
                        stroke="#1E40AF" stroke-width="3.27065" />
                    <circle cx="214.475" cy="222.95" r="17.4435" transform="rotate(180 214.475 222.95)"
                        stroke="#1E40AF" stroke-width="3.27065" />
                    <circle cx="214.476" cy="222.949" r="7.63152" transform="rotate(180 214.476 222.949)"
                        stroke="#3B82F6" stroke-width="3.27065" />
                    <rect x="193.216" y="180.976" width="55.6011" height="40.338"
                        transform="rotate(180 193.216 180.976)" fill="#1E40AF" />
                    <path d="M137.615 235.487L137.615 179.886L193.216 179.886L137.615 235.487Z" fill="#1D4ED8" />
                    <path d="M53.3108 199.749L108.476 110.517L163.642 199.749H53.3108Z" stroke="#1D4ED8"
                        stroke-width="2.18043" />
                    <path d="M65.9582 91L123.08 182.578H8.83672L65.9582 91Z" fill="#1D4ED8" />
                </g>
                <defs>
                    <clipPath id="clip0_1727_230">
                        <rect width="273" height="250" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
</body>

</html>
