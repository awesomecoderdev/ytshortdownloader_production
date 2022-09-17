@extends('layouts.app')

{{-- title --}}
@section('title', __('Recent Shorts Videos'))
@section('description',
    'Recent Shorts Videos downloaded by YT Short Downloader, Best free tool for Youtube shorts download online in HD
    quality. Paste the video link in the shorts downloader input box and hit the download button to process.',)
@section('url'){{ route('page.recent') }}@endsection
    {{-- @section('image', $article->thumb()) --}}
@section('time', \Carbon\Carbon::now())
@section('keywords',
    'shorts video download, youtube shorts download, shorts downloader,download youtube shorts, shorts
    video downloader, Youtube shorts download online,download youtube short videos,download youtube short video,short
    youtube video download,youtube short video downloader,youtube short video download,youtube shorts downloader
    online,youtube shorts downloader,youtube short download,yt short video download,youtube shorts to mp4,youtube shorts
    video download, shorts download in HD,how to download youtube shorts',)

@section('ldjson')
    {
    "@context": "https://schema.org",
    "@type": "Article",
    "name": "Recent Shorts Videos",
    "alternateName": "Recent Shorts Videos",
    "url": "{{ route('page.recent') }}"
    }
@endsection



@section('nav')
    {{-- start:nav --}}
    @include('layouts.nav')
    {{-- end:nav --}}
@endsection

@section('content')
    {{-- shorts list items::start --}}
    <div class="shorts">
        <div class="max-w-screen-xl mx-auto p-5 sm:p-6 md:p-8 lg:p-4 xl:p-5">
            <div id="shorts" data-token="{{ csrf_token() }}" data-load="{{ route('loadmore') }}" data-option="recent"
                data-page="1"
                class="relative grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 gap-5">
                @empty(!$shorts)
                    @foreach ($shorts as $short)
                        <div class="shortsItem shadow-lg drop-shadow-lg relative h-96 w-full  flex items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden"
                            style="background-image:url({{ end($short->thumbnails)->url }});">
                            <div
                                class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
                            </div>
                            <div class="absolute top-3 left-3 flex justify-between items-center">
                                <a href="{{ route('shorts.index') }}"
                                    class="text-xs rounded-full shadow-2xl drop-shadow-2xl bg-red-500 text-white p-2 uppercase dark:bg-primary-500/80  hover:text-indigo-600 transition ease-in-out duration-500 ">
                                    <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                        <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24" class="">
                                            <path
                                                d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                                class=""></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <main class="sm:p-4 p-3 z-10 overflow-hidden">
                                <a href="{{ route('shorts.show', $short->encode()) }}"
                                    class=" text-left text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">
                                    {{ limitString($short->title, 45) }}
                                </a>

                                <div class="relative flex items-start flex-col text-gray-200 text-xs">
                                    <span class="flex md:mt-2 lg:pb-0 pb-2">
                                        <span class="mr-1">By</span>
                                        @if (isset($short->channel) && $short->channel != null)
                                            <a href="{{ $short->channel }}" target="_blank"
                                                class="text-white font-semibold hover:underline">
                                                {{ ucfirst($short->channelTitle) }}
                                            </a>
                                        @else
                                            <p class="text-white font-semibold hover:underline">
                                                {{ ucfirst($short->channelTitle) }}
                                            </p>
                                        @endif
                                    </span>

                                    <p class="relative flex md:justify-start md:mt-2 items-center text-gray-200 text-xs">
                                        <span class="pl-0 ml-0 border-primary-500/50 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1">{{ views($short->statistics) }}</span>
                                        </span>
                                        <span
                                            class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                            <span class="ml-1">{{ likes($short->statistics) }}</span>
                                        </span>
                                        <span
                                            class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1">{{ comments($short->statistics) }}</span>
                                        </span>
                                        @if ($short->downloaded != null && downloaded($short->downloaded))
                                            <span
                                                class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                                </svg>
                                                <span class="ml-1">{{ downloaded($short->downloaded) }}</span>
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </main>

                        </div>
                    @endforeach
                @else
                    {{-- load animation::start --}}
                    <div
                        class="border animate-pulse border-primary-300/20 shadow-lg drop-shadow-lg relative h-96 w-full  flex items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden">
                        <div class="absolute top-3 left-3 flex justify-between items-center">
                            <a href="{{ route('shorts.index') }}"
                                class="text-xs rounded-full shadow-2xl drop-shadow-2xl bg-red-500/50 text-white p-2 uppercase dark:bg-primary-500/50  hover:text-indigo-600 transition ease-in-out duration-500 ">
                                <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                    <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24" class="">
                                        <path
                                            d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                            class=""></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">

                        </div>
                        <div class="rounded-md p-4 max-w-sm w-full mx-auto">
                            <div class="relative flex space-x-4">
                                <div class="flex-1 space-y-6 py-1">
                                    <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-2">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                        </div>
                                        <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="md:flex hidden border animate-pulse border-primary-300/20 shadow-lg drop-shadow-lg relative h-96 w-full items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden">
                        <div class="absolute top-3 left-3 flex justify-between items-center">
                            <a href="{{ route('shorts.index') }}"
                                class="text-xs rounded-full shadow-2xl drop-shadow-2xl bg-red-500/50 text-white p-2 uppercase dark:bg-primary-500/50  hover:text-indigo-600 transition ease-in-out duration-500 ">
                                <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                    <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24" class="">
                                        <path
                                            d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                            class=""></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">
                        </div>
                        <div class="rounded-md p-4 max-w-sm w-full mx-auto">
                            <div class="relative flex space-x-4">
                                <div class="flex-1 space-y-6 py-1">
                                    <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-2">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                        </div>
                                        <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="lg:flex hidden border animate-pulse border-primary-300/20 shadow-lg drop-shadow-lg relative h-96 w-full items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden">
                        <div class="absolute top-3 left-3 flex justify-between items-center">
                            <a href="{{ route('shorts.index') }}"
                                class="text-xs rounded-full shadow-2xl drop-shadow-2xl bg-red-500/50 text-white p-2 uppercase dark:bg-primary-500/50  hover:text-indigo-600 transition ease-in-out duration-500 ">
                                <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                    <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24" class="">
                                        <path
                                            d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                            class=""></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">
                        </div>
                        <div class="rounded-md p-4 max-w-sm w-full mx-auto">
                            <div class="relative flex space-x-4">
                                <div class="flex-1 space-y-6 py-1">
                                    <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-2">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                        </div>
                                        <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="xl:flex hidden border animate-pulse border-primary-300/20 shadow-lg drop-shadow-lg relative h-96 w-full   items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden">
                        <div class="absolute top-3 left-3 flex justify-between items-center">
                            <a href="{{ route('shorts.index') }}"
                                class="text-xs rounded-full shadow-2xl drop-shadow-2xl bg-red-500/50 text-white p-2 uppercase dark:bg-primary-500/50  hover:text-indigo-600 transition ease-in-out duration-500 ">
                                <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                    <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24" class="">
                                        <path
                                            d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                            class=""></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">
                        </div>
                        <div class="rounded-md p-4 max-w-sm w-full mx-auto">
                            <div class="relative flex space-x-4">
                                <div class="flex-1 space-y-6 py-1">
                                    <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-2">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                            <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded col-span-1">
                                            </div>
                                        </div>
                                        <div class="h-2 bg-primary-700/25 dark:bg-gray-400 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- load animation::end --}}
                @endempty
            </div>
        </div>
    </div>
    {{-- shorts list items::end --}}

    {{-- loading::start --}}
    <div id="loadmore" class="container flex justify-center relative py-4" @click.prevent="loadMore($event)"
        data-token="{{ csrf_token() }}" data-load="{{ route('loadmore') }}" data-option="recent">
        <button
            class=" border border-primary-400/20 cursor-pointer mx-auto relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
            <div
                class=" pointer-events-none  flex lg:flex-row justify-center items-center text-gray-500 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                <p class="lg:pb-0 flex relative" x-show="!animate">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 animate-bounce h-4 w-4" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0zm0 6a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 111.414-1.414L10 14.586l4.293-4.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="px-2">
                        {{ __('Load more...') }}
                    </span>
                </p>
                <p class="lg:pb-0 flex relative" x-show="animate">
                    <svg class="animate-spin h-5 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span class="px-2">
                        {{ __('Processing...') }}
                    </span>
                </p>
            </div>
        </button>
    </div>
    {{-- loading::end --}}
    {{-- nomore::start --}}
    <div id="nomore" style="display: none;" class="container flex justify-center relative py-4">
        <div
            class="max-w-[18rem] w-4/5 border border-primary-400/20 cursor-pointer mx-auto relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
            <div
                class=" pointer-events-none  flex lg:flex-row justify-center items-center text-gray-500 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                <p class="lg:pb-0 flex relative">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="animate-pulse h-5 w-5 text-yellow-500 dark:text-yellow-600 " viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="px-2">
                        {{ __('No more videos available. ') }}
                    </span>
                </p>
            </div>
        </div>
    </div>
    {{-- nomore::end --}}
@endsection
