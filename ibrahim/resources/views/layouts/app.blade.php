<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    {{ Cache::has('theme') && Cache::get('theme') == 'dark' ? 'class=dark' : '' }}>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (!View::hasSection('meta'))
        <meta property="og:site_name" content="YT Short Downloader" />
        <meta property="og:title" content='@yield('title') | YT Short Downloader' />
        <meta name="twitter:label1" content='@yield('title') | YT Short Downloader' />
        <meta name="description" content='@yield('description')' />
        <meta property="og:description" content='@yield('description')' />
        <meta property="og:url" content='@yield('url')' />
        <meta property="article:modified_time" content='@yield('time')' />
        @if (View::hasSection('height'))
            <meta property="og:image:height" content="@yield('height')" />
        @else
            <meta property="og:image:height" content="1005" />
        @endif
        @if (View::hasSection('ldjson'))
            <meta property="og:image:width" content="@yield('width')" />
        @else
            <meta property="og:image:width" content="1920" />
        @endif
        <meta property="og:image:type" content="image/jpeg" />
        <meta name="twitter:card" content="summary_large_image" />
        @if (View::hasSection('image'))
            <meta property="og:image" content='@yield('image')' />
            <meta name="twitter:image" content='@yield('image')' />
        @else
            <meta property="og:image" content='{{ asset('img/banner.png') }}' />
            <meta name="twitter:image" content='{{ asset('img/banner.png') }}' />
        @endif

        <meta name="twitter:data1" content="1 minute" />
        @if (View::hasSection('keywords'))
            <meta name="keywords" content='@yield('keywords')' />
        @else
            <meta name="keywords" content="'shorts video download, youtube shorts download, shorts downloader,download youtube shorts, shorts
        video downloader, Youtube shorts download online,download youtube short videos,download youtube short video,short
        youtube video download,youtube short video downloader,youtube short video download,youtube shorts downloader
        online,youtube shorts downloader,youtube short download,yt short video download,youtube shorts to mp4,youtube shorts
        video download, shorts download in HD,how to download youtube shorts'">
        @endif
    @else
        @yield('meta')
    @endif

    @if (View::hasSection('ldjson'))
        <script type="application/ld+json">
            @yield('ldjson')
        </script>
    @else
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Article",
                "name": "YouTube Shorts Downloader",
                "alternateName": "YouTube Shorts Download",
                "url": "{{ route('page.index') }}"
            }
        </script>
    @endif
<meta name="google-site-verification" content="VNSi3NbMIu-6Nq-THVwc-44FjtKyt39_hxfRM8OBg-0" />

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <title>@yield('title') | YT Short Downloader</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.2.0/turbolinks.js"></script>
    <script src="{{ asset('js/public.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="h-screen antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900" x-data="PublicController()">
    {{-- nav:start --}}
    @include('layouts.nav')
    {{-- nav:end --}}
    {{-- content:start --}}
    <main class="lg:mt-16 mt-20">
        @yield('content')
    </main>
    {{-- content:end --}}
    {{-- footer --}}
    {{-- footer:start --}}
    @include('layouts.footer')
    {{-- footer:end --}}
    {{-- scroll to top --}}
    <x-scroll-to-top />
    {{-- scripts:start --}}
    @yield('scripts')
    {{-- scripts:end --}}

    <div class=" bg-gray-100 flex items-center justify-center relative">
        <section class=" fixed bottom-0 w-full p-5 lg:px-6 bg-gray-600/90" x-show="showCookieBanner"
            x-transition:enter="transition-all ease-linear duration-300"
            x-transition:enter-start="transform translate-y-16 opacity-0"
            x-transition:enter-end="transform translate-y-0 opacity-100"
            x-transition:enter="transition-all ease-linear duration-300"
            x-transition:leave="transition-all ease-linear duration-300"
            x-transition:leave-start="transform translate-y-0 opacity-100"
            x-transition:leave-end="transform translate-y-16 opacity-0">
            <div class="container mx-auto md:flex items-center  ">
                <div class="md:flex-1 px-3 mb-5 md:mb-0">
                    <p class="text-center md:text-left font-light text-white text-xs leading-tight md:pr-6">We and
                        selected
                        partners and related companies, use cookies and similar technologies as specified in our
                        Cookies
                        Policy. You agree to consent to the use of these technologies by clicking Accept, or by
                        continuing to browse this website. You can learn more about how we use cookies and set
                        cookie
                        preferences in Settings.</p>
                </div>
                <div class="px-3 text-center md:space-y-0 space-y-2">
                    <button id="btn"
                        class="py-2 mx-1 w-full sm:w-auto px-8 bg-gray-800 hover:bg-gray-900 text-white rounded font-bold text-sm shadow-xl"
                        @click.prevent="document.getElementById('cookiesModal').showModal()">Cookie
                        settings</button>
                    <button id="btn"
                        class="py-2 mx-1 w-full sm:w-auto px-8 bg-green-400 hover:bg-green-500 text-white rounded font-bold text-sm shadow-xl"
                        @click.prevent="acceptCookie()">Accept cookies</button>
                </div>
            </div>
        </section>

        <dialog id="cookiesModal" class="h-auto w-11/12 md:w-1/2 bg-white overflow-hidden rounded-md p-0">
            <div class="flex flex-col w-full h-auto">
                <div class="flex w-full h-auto items-center px-5 py-3">
                    <div class="w-10/12 h-auto text-lg font-bold">
                        Cookie settings
                    </div>
                    <div class="flex w-2/12 h-auto justify-end">
                        <button @click.prevent="document.getElementById('cookiesModal').close();"
                            class="cursor-pointer focus:outline-none text-gray-400 hover:text-gray-800">
                            <i class="mdi mdi-close-circle-outline text-2xl"></i>
                        </button>
                    </div>
                </div>
                <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                    <div class="flex-1">
                        <p>Strictly necessary cookies</p>
                    </div>
                    <div class="w-10 text-right">
                        <i class="mdi mdi-check-circle text-2xl text-green-400 leading-none"></i>
                    </div>
                </div>
                <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                    <div class="flex-1">
                        <p>Cookies that remember your settings</p>
                    </div>
                    <div class="w-10 text-right">
                        <i class="mdi mdi-check-circle text-2xl text-green-400 leading-none"></i>
                    </div>
                </div>
                <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                    <div class="flex-1">
                        <p>Cookies that measure website use</p>
                    </div>
                    <div class="w-10 text-right">
                        <i class="mdi mdi-check-circle text-2xl text-green-400 leading-none"></i>
                    </div>
                </div>
                <div class="flex w-full items-center bg-gray-100 border-b border-gray-200 px-5 py-3 text-sm">
                    <div class="flex-1">
                        <p>Cookies that help with our communications and marketing</p>
                    </div>
                    <div class="w-10 text-right">
                        <i class="mdi mdi-check-circle text-2xl text-green-400 leading-none"></i>
                    </div>
                </div>
                <div class="flex w-full px-5 py-3 justify-end">
                    <button @click.prevent="document.getElementById('cookiesModal').close();"
                        class="py-2 px-8 bg-gray-800 hover:bg-gray-900 text-white rounded font-bold text-sm shadow-xl">Save
                        settings</button>
                </div>
            </div>
        </dialog>
    </div>

</body>

</html>
