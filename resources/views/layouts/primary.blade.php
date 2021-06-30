<!doctype html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="https://ganderoceanicoca.ams3.cdn.digitaloceanspaces.com/resources/media/img/brand/sqr/ZQO_SQ_TSPBLUE.png">
    @if(isset($_pageTitle))
        <title>{{ $_pageTitle }} | Gander Oceanic</title>
    @else
        <title>Gander Oceanic</title>
    @endif
    <meta property="og:title" content="@if(isset($_pageTitle)){{ $_pageTitle }} -@endif Gander Oceanic">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:image" content="@yield('og-image')">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireScripts
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5N tvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body class="min-h-screen">
    <nav class="bg-gray-200">
        <div class="lg:mx-auto lg:max-w-6xl px-14 py-5 flex flex-row items-center md:space-y-0 justify-between">
            <div class="">
                <a href="{{route('index')}}">
                    <img class="h-12" src="https://ams3.digitaloceanspaces.com/ganderoceanicoca/resources/media/img/brand/bnr/ZQO_BNR_TSPBLUE.png" alt="">
                </a>
            </div>
            <div x-data="{ drop: false }">
                <button @click="drop = !drop" class="md:hidden group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 group-hover:text-czqo-blue transition" x-bind:class="{ 'text-czqo-blue': drop }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div x-show="drop" class="md:hidden absolute left-0 right-0 top-16 w-full shadow-md bg-white" role="menu">
                    <div class="flex flex-col text-sm transition space-y-4 px-14 my-10">
                        <div x-data="{ drop: false }" class="relative inline-block text-left">
                            <div>
                                <a @click="drop = true" type="button" class="inline-flex items-center cursor-pointer hover:text-czqo-blue">
                                    About
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div x-show="drop" @click.away="drop = false"  class="mt-2" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('about.who-we-are') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <img class="h-6 w-6" src="https://ganderoceanicoca.ams3.cdn.digitaloceanspaces.com/resources/media/img/brand/sqr/ZQO_SQ_TSPBLUE.png" alt="">
                                            <span>Who we are</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <span>Our staff</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('news') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                            </svg>
                                            <span>Latest news</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span>Our policies</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ drop: false }" class="relative inline-block text-left">
                            <div>
                                <a @click="drop = true" type="button" class="inline-flex items-center cursor-pointer hover:text-czqo-blue">
                                    Roster
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div x-show="drop" @click.away="drop = false" class="mt-2" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('roster.public') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Controller Roster</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('solocertifications.public') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Solo Certifications</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="relative inline-block text-left">
                            <div>
                                <a href="{{ route('events.index') }}" type="button" class="inline-flex items-center cursor-pointer hover:text-czqo-blue">
                                    Events
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div x-data="{ drop: false }" class="relative inline-block text-left">
                            <div>
                                <a @click="drop = true" type="button" class="inline-flex items-center cursor-pointer hover:text-czqo-blue">
                                    Controllers
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div x-show="drop" @click.away="drop = false" class="mt-2" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('atcresources.index') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Documents</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>vNAAATS and EuroSounds</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Sector Files</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Knowledge Base</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ drop: false }" class="relative inline-block text-left">
                            <div>
                                <a @click="drop = true" type="button" class="inline-flex items-center cursor-pointer hover:text-czqo-blue">
                                    Pilots
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div x-show="drop" @click.away="drop = false"  class="mt-2" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Knowledge Base</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('pilots.tracks') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>NAT Tracks</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>natTRAK</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('map') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <span>Map</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ drop: false }" class="relative inline-block text-left">
                            <div>
                                <a @click="drop = true" type="button" class="inline-flex items-center cursor-pointer hover:text-czqo-blue">
                                    Community
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-mr-1 ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div x-show="drop" @click.away="drop = false" class="mt-2" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('about.who-we-are') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <img class="h-6 w-6" src="https://discord.com/assets/3437c10597c1526c3dbd98c737c2bcae.svg" alt="">
                                            <span>Discord</span>
                                        </div>
                                    </a>
                                    <a href="https://twitter.com/ganderocavatsim" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <svg class="h-6 w-6" viewBox="328 355 335 276" xmlns="http://www.w3.org/2000/svg">
                                                <path d="
                                            M 630, 425
                                            A 195, 195 0 0 1 331, 600
                                            A 142, 142 0 0 0 428, 570
                                            A  70,  70 0 0 1 370, 523
                                            A  70,  70 0 0 0 401, 521
                                            A  70,  70 0 0 1 344, 455
                                            A  70,  70 0 0 0 372, 460
                                            A  70,  70 0 0 1 354, 370
                                            A 195, 195 0 0 0 495, 442
                                            A  67,  67 0 0 1 611, 380
                                            A 117, 117 0 0 0 654, 363
                                            A  65,  65 0 0 1 623, 401
                                            A 117, 117 0 0 0 662, 390
                                            A  65,  65 0 0 1 630, 425
                                            Z" style="fill:#3BA9EE;"/>
                                            </svg>
                                            <span>Twitter</span>
                                        </div>
                                    </a>
                                    <a href="https://forums.vatcan.ca/forum/175-gander-oceanic-czqo/" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                        <div class="flex flex-row space-x-3 items-center">
                                            <img class="h-6 w-6" src="https://vatcan.ca/assets/media/logos/vatcansquare.png" alt="">
                                            <span>Forum (vatcan.ca)</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @auth
                            <div x-data="{ drop: false }" class="relative inline-block text-left">
                                <div class="group hover:bg-czqo-blue py-2 px-4 -ml-4 rounded-md transition">
                                    <a @click="drop = true" type="button" class="flex flex-row items-center cursor-pointer space-x-3">
                                        <img src="{{ auth()->user()->profile_image }}" alt="" class="h-10 rounded-full">
                                        <span class="font-bold text-czqo-blue group-hover:text-white transition">
                                    {{ auth()->user()->full_name }}
                                </span>
                                    </a>
                                </div>
                                <div x-show="drop" @click.away="drop = false" class="mt-2" role="menu">
                                    <div class="flex flex-col">
                                        <a href="{{ route('my.index') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                            <div class="flex flex-row space-x-3 items-center">
                                                <img class="h-6 w-6" src="https://ganderoceanicoca.ams3.cdn.digitaloceanspaces.com/resources/media/img/brand/sqr/ZQO_SQ_TSPBLUE.png" alt="">
                                                <span>myCZQO</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('training.portal.index') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                            <div class="flex flex-row space-x-3 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                </svg>
                                                <span>My training</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                            <div class="flex flex-row space-x-3 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                                </svg>
                                                <span>My certification</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-red-600 group" role="menuitem">
                                            <div class="flex flex-row space-x-3 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <span>Sign out</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="group hover:bg-czqo-blue py-2 px-4 -ml-4 rounded-md transition">
                                <a href="{{ route('auth.connect.login') }}" type="button" class="flex flex-row items-center cursor-pointer space-x-3">
                            <span class="text-center font-bold text-czqo-blue group-hover:text-white transition">
                                Sign In with VATSIM
                            </span>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:flex flex-row text-sm transition items-center space-x-4">
                <div x-data="{ drop: false }" class="relative inline-block text-left">
                    <div>
                        <a @click="drop = true" type="button" class="appearance-none inline-flex items-center cursor-pointer hover:text-czqo-blue">
                            About
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div x-show="drop" @click.away="drop = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-md bg-white" role="menu">
                        <div class="py-1">
                            <a href="{{ route('about.who-we-are') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <img class="h-6 w-6" src="https://ganderoceanicoca.ams3.cdn.digitaloceanspaces.com/resources/media/img/brand/sqr/ZQO_SQ_TSPBLUE.png" alt="">
                                    <span>Who we are</span>
                                </div>
                            </a>
                            <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Our staff</span>
                                </div>
                            </a>
                            <a href="{{ route('news') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                    <span>Latest news</span>
                                </div>
                            </a>
                            <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>Our policies</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div x-data="{ drop: false }" class="relative inline-block text-left">
                    <div>
                        <a @click="drop = true" type="button" class="appearance-none inline-flex items-center cursor-pointer hover:text-czqo-blue">
                            Roster
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div x-show="drop" @click.away="drop = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-md bg-white" role="menu">
                        <div class="py-1">
                            <a href="{{ route('roster.public') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Controller Roster</span>
                                </div>
                            </a>
                            <a href="{{ route('solocertifications.public') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Solo Certifications</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('events.index') }}" type="button" class="appearance-none inline-flex items-center cursor-pointer hover:text-czqo-blue">
                    Events
                </a>
                <div x-data="{ drop: false }" class="relative inline-block text-left">
                    <div>
                        <a @click="drop = true" type="button" class="appearance-none inline-flex items-center cursor-pointer hover:text-czqo-blue">
                            Controllers
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div x-show="drop" @click.away="drop = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-md bg-white" role="menu">
                        <div class="py-1">
                            <a href="{{ route('atcresources.index') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Documents</span>
                                </div>
                            </a>
                            <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>vNAAATS and EuroSounds</span>
                                </div>
                            </a>
                            <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Sector Files</span>
                                </div>
                            </a>
                            <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Knowledge Base</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div x-data="{ drop: false }" class="relative inline-block text-left">
                    <div>
                        <a @click="drop = true" type="button" class="appearance-none inline-flex items-center cursor-pointer hover:text-czqo-blue">
                            Pilots
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div x-show="drop" @click.away="drop = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-md bg-white" role="menu">
                        <div class="py-1">
                            <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Knowledge Base</span>
                                </div>
                            </a>
                            <a href="{{ route('pilots.tracks') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>NAT Tracks</span>
                                </div>
                            </a>
                            <a href="{{ route('policies') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>natTRAK</span>
                                </div>
                            </a>
                            <a href="{{ route('map') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <span>Map</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div x-data="{ drop: false }" class="relative inline-block text-left">
                    <div>
                        <a @click="drop = true" type="button" class="appearance-none inline-flex items-center cursor-pointer hover:text-czqo-blue">
                            Community
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div x-show="drop" @click.away="drop = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-md bg-white" role="menu">
                        <div class="py-1">
                            <a href="{{ route('about.who-we-are') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <img class="h-6 w-6" src="https://discord.com/assets/3437c10597c1526c3dbd98c737c2bcae.svg" alt="">
                                    <span>Discord</span>
                                </div>
                            </a>
                            <a href="https://twitter.com/ganderocavatsim" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <svg class="h-6 w-6" viewBox="328 355 335 276" xmlns="http://www.w3.org/2000/svg">
                                        <path d="
                                            M 630, 425
                                            A 195, 195 0 0 1 331, 600
                                            A 142, 142 0 0 0 428, 570
                                            A  70,  70 0 0 1 370, 523
                                            A  70,  70 0 0 0 401, 521
                                            A  70,  70 0 0 1 344, 455
                                            A  70,  70 0 0 0 372, 460
                                            A  70,  70 0 0 1 354, 370
                                            A 195, 195 0 0 0 495, 442
                                            A  67,  67 0 0 1 611, 380
                                            A 117, 117 0 0 0 654, 363
                                            A  65,  65 0 0 1 623, 401
                                            A 117, 117 0 0 0 662, 390
                                            A  65,  65 0 0 1 630, 425
                                            Z" style="fill:#3BA9EE;"/>
                                    </svg>
                                    <span>Twitter</span>
                                </div>
                            </a>
                            <a href="https://forums.vatcan.ca/forum/175-gander-oceanic-czqo/" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                <div class="flex flex-row space-x-3 items-center">
                                    <img class="h-6 w-6" src="https://vatcan.ca/assets/media/logos/vatcansquare.png" alt="">
                                    <span>Forum (vatcan.ca)</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @auth
                    <div x-data="{ drop: false }" class="relative inline-block text-left appearance-none">
                        <div class="group hover:bg-czqo-blue py-2 px-4 rounded-md transition">
                            <a @click="drop = true" type="button" class="appearance-none flex flex-row items-center cursor-pointer space-x-3">
                                <img src="{{ auth()->user()->profile_image }}" alt="" class="h-10 rounded-full">
                                <span class="font-bold text-czqo-blue group-hover:text-white transition">
                                    {{ auth()->user()->full_name }}
                                </span>
                            </a>
                        </div>
                        <div x-show="drop" @click.away="drop = false" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-md" role="menu">
                            <div class="bg-czqo-blue rounded-t-md">
                                <div class="flex flex-col px-4 py-3">
                                    <img src="{{ auth()->user()->profile_image }}" alt="" class="w-1/2 rounded-full">
                                    <div class="font-bold text-lg text-white mt-3 mb-1">
                                        {{ auth()->user()->full_name_cid }}
                                    </div>
                                    <div class="text-md text-white">
                                        {{ auth()->user()->highest_role->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col py-3 bg-white rounded-b-md">
                                <a href="{{ route('my.index') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                    <div class="flex flex-row space-x-3 items-center">
                                        <img class="h-6 w-6" src="https://ganderoceanicoca.ams3.cdn.digitaloceanspaces.com/resources/media/img/brand/sqr/ZQO_SQ_TSPBLUE.png" alt="">
                                        <span>myCZQO</span>
                                    </div>
                                </a>
                                <a href="{{ route('training.portal.index') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                    <div class="flex flex-row space-x-3 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                        <span>My training</span>
                                    </div>
                                </a>
                                <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-czqo-blue group" role="menuitem">
                                    <div class="flex flex-row space-x-3 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-czqo-blue group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                        <span>My certification</span>
                                    </div>
                                </a>
                                <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm hover:text-white hover:bg-red-600 group" role="menuitem">
                                    <div class="flex flex-row space-x-3 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Sign out</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="group hover:bg-czqo-blue py-2 px-4 rounded-md transition">
                        <a href="{{ route('auth.connect.login') }}" type="button" class="flex flex-row items-center cursor-pointer space-x-3">
                            <span class="text-center font-bold text-czqo-blue group-hover:text-white transition">
                                Sign In with VATSIM
                            </span>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="text-sm text-gray-600">
        <div class="lg:mx-auto lg:max-w-6xl py-12 px-14">
            <p>
                Copyright (C) Gander Oceanic OCA 2018-2021. All Rights Reserved.<br>Not to be used for real world navigation. Flight simulation only.
            </p>
            <div class="mt-4">
                <a href="https://ganderoceanic.ca" class="hover:underline">Feedback</a>
                &nbsp;
                •
                &nbsp;
                <a href="https://ganderoceanic.ca/about/core" class="hover:underline">About</a>
                &nbsp;
                •
                &nbsp;
                <a href="https://ganderoceanic.ca/privacy" class="hover:underline">Privacy Policy</a>
                &nbsp;
                •
                &nbsp;
                <a href="https://github.com/gander-oceanic-fir-vatsim/czqo-core" class="hover:underline">GitHub</a>
                &nbsp;
                •
                &nbsp;
                <a href="https://ganderoceanic.ca/branding" class="hover:underline">Branding</a>
                &nbsp;
                •
                &nbsp;
                <a href="#" class="hover:underline">Contact Us</a>
                &nbsp;
                •
                &nbsp;
                <a href="https://vatsim.net" class="hover:underline">VATSIM.net</a>
                &nbsp;
                •
                &nbsp;
                <a href="https://vatcan.ca" class="hover:underline">VATCAN.ca</a>
            </div>
        </div>
        <div class="bg-gradient-to-r from-red-300 via-yellow-300 to-green-300">
            <div class="lg:mx-auto lg:max-w-6xl py-8 px-14">
                <p class="text-black font-medium">
                    Gander Oceanic stands in solidarity with the LGBT+ community in our community.
                </p>
            </div>
        </div>
    </footer>
</body>
<!--Toasify notifications-->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            Toastify({
                text: "Error - {{$error}}",
                duration: 5000,
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: 'right', // `left`, `center` or `right`
                backgroundColor: '#ff4444',
                offset: {
                    x: 100, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                    y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                },
                stopOnFocus: true, // Prevents dismissing of toast on hover
            }).showToast();
        </script>
    @endforeach
@endif
@if (\Session::has('success'))
    <script>
        Toastify({
            text: "{{\Session::get('success')}}",
            duration: 5000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: 'right', // `left`, `center` or `right`
            backgroundColor: '#00C851',
            offset: {
                x: 100, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    </script>
@endif
@if (\Session::has('error'))
    <script>
        Toastify({
            text: "{{\Session::get('error')}}",
            duration: 5000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: 'right', // `left`, `center` or `right`
            backgroundColor: '#ff4444',
            offset: {
                x: 100, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    </script>
@endif
@if (\Session::has('info'))
    <script>
        Toastify({
            text: "{{\Session::get('info')}}",
            duration: 5000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: 'right', // `left`, `center` or `right`
            backgroundColor: '#33b5e5',
            offset: {
                x: 100, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    </script>
@endif
<!--End Toastify notifications-->
</html>

