@extends('layouts.app')

{{-- title --}}
@section('title', ucfirst($short->title))
@section('description',
    !empty($short->description)
    ? ucfirst($short->description)
    : ucfirst($short->title) .
    ' | YT
    Short Downloader',)
@section('url'){{ route('shorts.show', encode($short->vid)) }}@endsection
@section('image', end($short->thumbnails)->url)
@section('height', end($short->thumbnails)->height)
@section('width', end($short->thumbnails)->width)
@section('time', isset($short->updated_at) ? $short->updated_at : \Carbon\Carbon::now())

@if (isset($short->tags) && !empty($short->tags))
    @section('keywords', implode(',', $short->tags))
@endif

@section('ldjson')
    {
    "@context": "https://schema.org/",
    "@type": "Video",
    "name": "{{ ucfirst($short->title) }}",
    "alternateName": "YouTube Shorts Download",
    "url": "{{ route('shorts.show', encode($short->vid)) }}"
    "author": {
    "@type": "Channel",
    "name": "{{ $short->channelTitle }}"
    },
    "datePublished":
    "{{ isset($short->updated_at) ? date('Y-m-d', strtotime($short->updated_at)) : \Carbon\Carbon::now() }}",
    "description":
    "{{ !empty($short->description) ? ucfirst($short->description) : ucfirst($short->title) . ' | YT hort Downloader' }}",
    "readingTime": "RT1M"
    }
@endsection
@section('content')
    <div class="max-w-screen-xl mx-auto relative">
        <div class="md:flex relative">
            {{-- body::start --}}
            <div class="md:w-6/12 lg:w-8/12 p-3 ">
                {{-- header::start --}}
                <div class="mt-1 border dark:border-primary-200/10 relative max-h-[80vh] md:h-[35rem] sm:h-[30rem] h-[28rem] w-full flex items-end justify-start text-left bg-cover bg-center bg-no-repeat shadow-lg drop-shadow-lg rounded-2xl overflow-hidden"
                    style="background-image:url({{ end($short->thumbnails)->url }});">
                    <div class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
                    </div>
                    <div class="absolute top-0 right-0 left-0 mx-6 mt-4 flex justify-between items-center">
                        <a href="{{ route('shorts.index') }}"
                            class="shadow-lg drop-shadow-sm text-xs rounded-full bg-red-500 text-white p-2 uppercase dark:bg-primary-500/80 hover:text-indigo-600 transition ease-in-out duration-500 ">
                            <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24"
                                    class="style-scope yt-icon">
                                    <path
                                        d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                        class="style-scope yt-icon"></path>
                                </g>
                            </svg>
                        </a>
                        <div class="text-white font-regular flex flex-col justify-start">
                            {{-- <span class="text-3xl leading-0 font-semibold">{{ date('d') }}</span>
                            <span class="-mt-3">{{ date('M') }}</span> --}}
                        </div>
                    </div>

                    <div class="absolute top-0 right-0 left-0 bottom-0 h-full w-full flex justify-center items-center">
                        <a href="{{ "https://www.youtube.com/shorts/{$short->vid}" }}" target="_blank"
                            class=" relative outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="animate-ping transfrom scale-150 absolute h-16 w-16 z-0 text-gray-100/20"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-16 w-16 transfrom scale-75 z-10 text-primary-100" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                    <main class="p-4 z-10">
                        <a href="{{ "https://www.youtube.com/shorts/{$short->vid}" }}" target="_blank"
                            class="text-xl tracking-tight font-semibold leading-7 mb-3 inline-block text-white hover:underline ">
                            {{ $short->title }}
                            {{-- truncate w-96 --}}
                        </a>
                        <div class="flex lg:items-center items-start lg:flex-row flex-col text-gray-200 text-xs">
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
                                <span
                                    class="lg:pl-2 lg:ml-2 pl-0 ml-0 lg:border-l border-primary-500/50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1">{{ views($short->statistics) }}</span>
                                </span>
                                <span class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                    <span class="ml-1">{{ likes($short->statistics) }}</span>
                                </span>
                                <span class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1">{{ comments($short->statistics) }}</span>
                                </span>
                                @if (isset($short->downloaded) && $short->downloaded != null && downloaded($short->downloaded))
                                    <span
                                        class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
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
                {{-- header::end --}}

                {{-- share::start --}}
                <div class="w-full mx-auto my-4">
                    <div class="relative rounded-lg ">
                        <ul class="flex flex-wrap xl:justify-start justify-between">
                            <li class="w-1/4 px-1">
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer.php?u={{ route('shorts.show', encode($short->vid)) }}"
                                    class="w-full justify-center border-primary-300/20 dark:border-primary-200/10 shadow-lg drop-shadow-sm border bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150 inline-flex items-center mr-2 md:px-3 px-2 md:py-3 py-2 my-1 rounded-full text-sm text-gray-500 dark:text-white"
                                    title="Share this short to facebook">
                                    <span class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                        <svg class="w-auto h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="px-2 lg:block hidden">Facebook</span>
                                </a>
                            </li>
                            <li class="w-1/4 px-1">
                                <a target="_blank"
                                    href="https://twitter.com/share?text={{ strtok($short->title, '#') }}YtShortDownloader&url={{ route('shorts.show', encode($short->vid)) }}"
                                    class="w-full justify-center border-primary-300/20 dark:border-primary-200/10 shadow-lg drop-shadow-sm border bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150 inline-flex items-center mr-2 md:px-3 px-2 md:py-3 py-2 my-1 rounded-full text-sm text-gray-500 dark:text-white"
                                    title="Share this short to twitter">
                                    <span class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                        <svg class="w-auto h-4 fill-current " xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="px-2 lg:block hidden">Twitter</span>
                                </a>
                            </li>
                            <li class="w-1/4 px-1">
                                <a target="_blank"
                                    href="https://wa.me/?text={{ strtok($short->title, '#') }}  YtShortDownloader, {{ route('shorts.show', encode($short->vid)) }}"
                                    class="w-full justify-center border-primary-300/20 dark:border-primary-200/10 shadow-lg drop-shadow-sm border bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150 inline-flex items-center mr-2 md:px-3 px-2 md:py-3 py-2 my-1 rounded-full text-sm text-gray-500 dark:text-white "
                                    title="Share this short to whatsapp">
                                    <span class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                        <svg class="w-auto h-4 fill-current " xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="px-2 lg:block hidden">Whatsapp</span>
                                </a>
                            </li>
                            <li class="w-1/4 px-1">
                                <a target="_blank"
                                    href="https://t.me/share/url?url={{ route('shorts.show', encode($short->vid)) }}&text={{ strtok($short->title, '#') }} YtShortDownloader"
                                    class="w-full justify-center border-primary-300/20 dark:border-primary-200/10 shadow-lg drop-shadow-sm border bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150 inline-flex items-center mr-2  md:px-3 px-2 md:py-3 py-2 my-1 rounded-full text-sm text-gray-500 dark:text-white"
                                    title="Share this short to telegram">
                                    <span class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                        <svg class="w-auto h-4 fill-current " xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="px-2 lg:block hidden">Telegram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- share::end --}}

                {{-- alert::start --}}
                <div
                    class="relative border dark:border-primary-200/10 overflow-hidden  mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-red-500/25 supports-backdrop-blur:bg-white/60 dark:bg-red-800/20 backdrop-saturate-150">
                    <p
                        class="flex justify-between items-center text-gray-900 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="animate-pulse h-8 w-8 text-red-500 dark:text-red-600 absolute top-2 left-2 -z-0"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="lg:pb-0 pb-2 z-10 leading-6">
                            <a href="{{ route('page.index') }}"
                                class="text-primary-500 dark:text-white italic font-bold  ml-8">ytshortdownloader.com</a>
                            have
                            not any right to videos, photos, or any images. All the right goes to the original creators or
                            YouTube.
                        </span>

                    </p>
                </div>
                {{-- alert::end --}}

                {{-- downloademore::start --}}
                <div
                    class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                    <div
                        class="flex lg:flex-row flex-col justify-between items-center text-gray-500 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                        <p class="lg:pb-0 pb-2 ">
                            Try again if you can't download short.
                        </p>
                        <a href="{{ route('page.index') }}"
                            class="relative w-full max-w-xs flex flex-wrap justify-center items-center outline-none transition-all duration-150 bg-slate-400/10 rounded-full hover:bg-slate-400/20">
                            <div
                                class="pointer-events-none md:w-4/5 w-11/12 flex items-center justify-center space-x-2 md:py-2 sm:py-1 py-2 px-3 lg:ml-2 sm:ml-0 md:mt-0 text-xs leading-5 font-semibold dark:highlight-white/5">
                                <span>{{ __('Download another short') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="pointer-events-none ml-2 text-gray-500 dark:text-white h-auto w-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- downloademore::end --}}

                {{-- downloaded::start --}}
                <div
                    class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                    <div
                        class="flex lg:flex-row flex-col justify-between items-center text-gray-500 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                        <p class="lg:pb-0 pb-2 ">
                            {{ limitString($short->title, 40) }}
                        </p>
                        <button data-token="{{ csrf_token() }}" data-downloads="{{ encode($short->vid) }}"
                            @click.prevent="downloadVideo($event)" data-download="{{ route('downloads') }}"
                            class="relative w-full max-w-xs flex flex-wrap justify-center items-center outline-none transition-all duration-150 bg-slate-400/10 rounded-full hover:bg-slate-400/20">
                            <div
                                class="pointer-events-none md:w-4/5 w-11/12 flex items-center justify-center space-x-2 md:py-2 sm:py-1 py-2 px-3 lg:ml-2 sm:ml-0 md:mt-0 text-xs leading-5 font-semibold dark:highlight-white/5">
                                <span>{{ __('Download Now') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="pointer-events-none ml-2 text-gray-500 dark:text-white h-auto w-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                {{-- downloaded::end --}}

                {{-- download:result::start --}}
                <div id="download">
                    {{-- loading::start --}}
                    <div x-show="loading"
                        class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                        <span
                            class="animate-ping absolute h-full w-full transition-all duration-300 bg-primary-400/20 opacity-75"></span>
                        <div
                            class="flex lg:flex-row justify-center items-center text-gray-500 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                            <p class="lg:pb-0 flex relative">
                                <svg class="animate-spin h-5 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>

                                <span class="px-2">
                                    {{ __('Processing...') }}
                                </span>
                            </p>
                        </div>
                    </div>
                    {{-- loading::end --}}
                </div>
                {{-- download:result::end --}}
                {{-- shorts list items::start --}}
                <div class="shorts mt-6">
                    <div class="max-w-screen-xl mx-auto ">
                        <div id="shorts" data-token="{{ csrf_token() }}" data-load="{{ route('loadmore') }}"
                            data-option="shorts" data-page="1"
                            class="relative  grid grid-cols-1 xl:grid-cols-3 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-4">
                            @empty(!$recent)
                                @foreach ($recent as $short)
                                    <div class="shortsItem shadow-lg drop-shadow-lg relative h-96 w-full  flex items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden"
                                        style="background-image:url({{ end($short->thumbnails)->url }});">
                                        <div
                                            class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
                                        </div>
                                        <div class="absolute top-3 left-3 flex justify-between items-center">
                                            <a href="{{ route('shorts.index') }}"
                                                class="text-xs rounded-full shadow-2xl drop-shadow-2xl bg-red-500 text-white p-2 uppercase dark:bg-primary-500/80  hover:text-indigo-600 transition ease-in-out duration-500 ">
                                                <svg viewBox="0 0 24 24" class="h-7 w-7 text-white">
                                                    <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24"
                                                        class="">
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
                                                <span class="md:mt-2 lg:pb-0 pb-2">
                                                    By
                                                    <span class="text-white font-semibold hover:underline">
                                                        {{ limitString($short->channelTitle) }}
                                                    </span>
                                                </span>

                                                <p
                                                    class="relative flex md:justify-start md:mt-2 items-center text-gray-200 text-xs">
                                                    <span
                                                        class="pl-0 ml-0 border-primary-500/50 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd"
                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-1">{{ views($short->statistics) }}</span>
                                                    </span>
                                                    <span
                                                        class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                        </svg>
                                                        <span class="ml-1">{{ likes($short->statistics) }}</span>
                                                    </span>
                                                    <span
                                                        class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span
                                                            class="ml-1">{{ comments($short->statistics) }}</span>
                                                    </span>
                                                    @if ($short->downloaded != null && downloaded($short->downloaded))
                                                        <span
                                                            class="xl:hidden lg:hidden sm:flex flex border-l border-primary-500/50 pl-2 ml-2  items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                                            </svg>
                                                            <span
                                                                class="ml-1">{{ downloaded($short->downloaded) }}</span>
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
                                                <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24"
                                                    class="">
                                                    <path
                                                        d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div
                                        class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">

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
                                                <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24"
                                                    class="">
                                                    <path
                                                        d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div
                                        class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">
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
                                                <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24"
                                                    class="">
                                                    <path
                                                        d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div
                                        class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">
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
                                                <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24"
                                                    class="">
                                                    <path
                                                        d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div
                                        class="absolute left-4 top-4 right-4 bottom-36 rounded-md bg-primary-700/10 dark:bg-gray-300">
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
                <div id="loadmore" class="container flex justify-center relative py-5" @click.prevent="loadMore($event)"
                    data-token="{{ csrf_token() }}" data-load="{{ route('loadmore') }}" data-option="shorts">
                    <button
                        class="border border-primary-400/20 cursor-pointer mx-auto relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                        <div
                            class=" pointer-events-none  flex lg:flex-row justify-center items-center text-gray-500 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                            <p class="lg:pb-0 flex relative" x-show="!animate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 animate-bounce h-4 w-4"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0zm0 6a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 111.414-1.414L10 14.586l4.293-4.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="px-2">
                                    {{ __('Load more...') }}
                                </span>
                            </p>
                            <p class="lg:pb-0 flex relative" x-show="animate">
                                <svg class="animate-spin h-5 w-5 " xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
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
                        class="max-w-[18rem] w-4/5  border border-primary-400/20 cursor-pointer mx-auto relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
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
            </div>
            {{-- body::end --}}

            {{-- sidebar::start --}}
            <div class="md:w-6/12 lg:w-4/12 md:pl-1 p-3 relative ">
                <div id="siebar" class="overflow-y-auto sticky max-h-(screen-18) top-20 ">
                    @foreach ($popular as $item)
                        <div
                            class="border dark:border-primary-200/10 overflow-hidden relative flex items-start mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                            <a href="{{ route('shorts.show', $item->encode()) }}" class="inline-block mr-3">
                                <div class="w-24 h-24 bg-cover bg-center"
                                    style="background-image:url({{ end($item->thumbnails)->url }});">
                                </div>
                            </a>
                            <div class="text-base">
                                <a href="{{ route('shorts.show', $item->encode()) }}"
                                    class="text-gray-900 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
                                    {{ limitString($item->title) }}
                                </a>
                                <div
                                    class=" absolute bottom-4 flex lg:items-center items-start lg:flex-row flex-col text-gray-200  ">
                                    <p
                                        class="relative flex md:justify-start md:mt-2 items-center text-gray-500 dark:text-white text-xs">
                                        <span class=" border-primary-500/50 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1">{{ views($item->statistics) }}</span>
                                        </span>
                                        <span
                                            class=" border-l border-primary-500/50 pl-1 ml-1 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                            <span class="ml-1">{{ likes($item->statistics) }}</span>
                                        </span>
                                        <span
                                            class=" border-l border-primary-500/50 pl-1 ml-1 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1">{{ comments($item->statistics) }}</span>
                                        </span>

                                        @if ($item->downloaded != null && downloaded($item->downloaded))
                                            <span
                                                class="xl:flex lg:hidden md:flex sm:flex hidden border-l border-primary-500/50 pl-1 ml-1  items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-3"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                                </svg>
                                                <span class="ml-1">{{ downloaded($item->downloaded) }}</span>
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            {{-- sidebar::end --}}
        </div>
    </div>


@endsection
