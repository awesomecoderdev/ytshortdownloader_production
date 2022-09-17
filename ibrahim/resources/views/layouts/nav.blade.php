@php
$navItems = [
    [
        'name' => 'Home',
        'link' => route('page.index'),
    ],
    [
        'name' => 'Shorts',
        'link' => route('shorts.index'),
    ],
    [
        'name' => 'Recent',
        'link' => route('page.recent'),
    ],
    [
        'name' => 'Popular',
        'link' => route('page.popular'),
    ],
];

@endphp
<div class="fixed z-20 top-0 inset-x-0 flex justify-center overflow-hidden pointer-events-none ">
    <div class="w-[108rem] flex-none flex justify-end">
        <picture class="hue-rotate-90 opacity-95 blur-lg">
            <source srcset="{{ asset('img/lightsrcset.avif') }}" type="image/avif"><img
                src="{{ asset('img/bglight.png') }}" alt="" class="w-[71.75rem] flex-none max-w-none dark:hidden">
        </picture>
        <picture class="-hue-rotate-30 opacity-95 blur-lg">
            <source srcset="{{ asset('img/darksrcset.avif') }}" type="image/avif">
            <img src="{{ asset('img/bgdark.png') }}" alt="" class="w-[90rem] flex-none max-w-none hidden dark:block">
        </picture>
    </div>
</div>

<div @click.outside="menu = false" @close.stop="menu = false">
    {{-- mobile menu --}}
    <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true" x-show="menu">
        <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" x-show="menu"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
        <div class=" relative max-w-xs w-full bg-white dark:bg-slate-900 shadow-xl pb-12 flex flex-col overflow-y-auto"
            x-show="menu" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">

            <div class="pt-24 border-gray-200/70 dark:border-gray-200/10 py-6 px-4 space-y-6">
                @foreach ($navItems as $item)
                    <div class="flow-root">
                        <a href="{{ $item['link'] }}"
                            class="-m-2 p-2 block font-medium text-slate-900 dark:text-gray-400">
                            {{ $item['name'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- menu --}}
    <header
        class="fixed top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-900/20 backdrop-saturate-150">
        <div class="max-w-7xl border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10  mx-auto">
            <div class="py-4 mx-4 lg:mx-0">
                <div class="relative flex items-center">
                    {{-- hambarger --}}
                    <button @click="menu = ! menu" type="button"
                        class="bg-white border border-primary-500/20 dark:bg-slate-800 p-2 rounded-md text-gray-400 lg:hidden outline-none">
                        <span class="sr-only">Open menu</span>
                        <svg x-show="!menu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-show="menu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    {{-- menu items --}}
                    <a class="ml-3 flex-none overflow-hidden md:w-auto" href="{{ route('page.index') }}">
                        <span class="sr-only">Yt Downloader</span>
                        <span class="flex pointer-events-none">
                            <span class="tracking-wide text-gray-500 dark:text-primary-50 font-bold text-md">Yt</span>
                            <svg viewBox="0 0 24 24" class="h-6 w-6 text-red-500 dark:text-primary-50">
                                <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24">
                                    <path
                                        d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z">
                                    </path>
                                </g>
                            </svg>
                            <span
                                class="tracking-wide text-primary-500/80 dark:text-primary-50 font-bold text-md">Downloader</span>
                        </span>
                    </a>

                    {{-- <div class="relative">
                        <button
                            class="text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5"
                            id="headlessui-menu-button-1" type="button" aria-haspopup="true" aria-expanded="false">v
                            <!-- -->3.0.24<svg width="6" height="3" class="ml-2 overflow-visible" aria-hidden="true">
                                <path d="M0 0L3 3L6 0" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                            </svg>
                        </button>
                    </div> --}}

                    {{-- menu --}}
                    <div class="relative flex items-center ml-auto">
                        <nav class="hidden lg:flex text-sm leading-6 font-semibold text-slate-700 dark:text-slate-200">
                            <ul class="flex lg:space-x-8">
                                @foreach ($navItems as $item)
                                    <li>
                                        <a class="hover:text-primary-500 dark:hover:text-primary-400"
                                            href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                        <div class="relative">
                            <div class="flex items-center ">
                                <x-change-theme />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
