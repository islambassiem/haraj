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

<body>
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                            <span
                                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        alt="user photo">
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        Neil Sims
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none">
                                        neil.sims@flowbite.com
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside id="logo-sidebar" x-data="{
            openList: null,
            toggleList: function(listId) {
                const list = document.getElementById(listId);
                const isVisible = list.style.display !== 'none';

                const lists = document.querySelectorAll('.list');
                lists.forEach((l) => {
                    l.style.display = 'none';
                    l.inert = true;
                });

                list.style.display = isVisible ? 'none' : 'block';
                list.inert = isVisible ? true : false;
                openList = isVisible ? null : listId
            }
        }"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <x-sidebar.button @click="toggleList('home')">Home</x-sidebar.button>
                        <ul id="home" class="list py-2 space-y-2" x-show="openList === 'home'" x-cloak>
                            @foreach ($home as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>

                        <x-sidebar.button @click="toggleList('entertainment')">Entertainment</x-sidebar.button>
                        <ul id="entertainment" class="list py-2 space-y-2" x-show="openList === 'entertainment'" x-cloak>
                            @foreach ($entertainment as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>

                        <x-sidebar.button @click="toggleList('accessories')">Accessories</x-sidebar.button>
                        <ul id="accessories" class="list py-2 space-y-2" x-show="openList === 'accessories'" x-cloak>
                            @foreach ($accessories as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>

                        <x-sidebar.button @click="toggleList('family')">Family</x-sidebar.button>
                        <ul id="family" class="list py-2 space-y-2" x-show="openList === 'family'" x-cloak>
                            @foreach ($family as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>

                        <x-sidebar.button @click="toggleList('electronics')">Electronics</x-sidebar.button>
                        <ul id="electronics" class="list py-2 space-y-2" x-show="openList === 'electronics'" x-cloak>
                            @foreach ($electronics as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>

                        <x-sidebar.button @click="toggleList('hobbies')">Hobbies</x-sidebar.button>
                        <ul id="hobbies" class="list py-2 space-y-2" x-show="openList === 'hobbies'" x-cloak>
                            @foreach ($hobbies as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>

                        <x-sidebar.button @click="toggleList('vichies')">Vichies</x-sidebar.button>
                        <ul id="vichies" class="list py-2 space-y-2" x-show="openList === 'vichies'" x-cloak>
                            @foreach ($vichies as $item)
                                <x-sidebar.list-item href="{{ url('/category/' . $item->uuid) }}">{{ Str::ucfirst($item->name) }}</x-sidebar.list-item>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
