@extends('layouts.app')

{{-- title --}}
@section('title', 'Shorts Video Download Online')
@section('description',
    'Best free tool for Youtube shorts download online in HD quality. Paste the video link in the
    shorts downloader input box and hit the download button to process.',)
@section('url'){{ route('page.index') }}@endsection
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
    "name": "YouTube Shorts Downloader",
    "alternateName": "YouTube Shorts Download",
    "url": "{{ route('page.index') }}"
    }
@endsection


@section('content')

    <div class="lg:py-20 md:py-10 py-5 bg-primary-400/5">
        <div class="container relative flex justify-center items-center">
            <form action="{{ route('shorts.store') }}" method="POST">
                <div class="relative flex md:flex-row flex-col sm:space-x-2 space-y-2">
                    @csrf
                    <label class="relative block">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input
                            class="ring-1  @error('short') ring-red-500 @else ring-primary-500 @enderror md:min-w-[30rem] min-w-[94vw] placeholder:italic placeholder:text-slate-400 block bg-transparent w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-primary-500 focus:ring-primary-500 focus:ring-1 sm:text-sm"
                            placeholder="Past link here..." type="text" name="short" value="{{ old('short') }}" />
                    </label>
                    <button
                        class="md:ml-2 ml-0 rounded ring-1 ring-primary-400  bg-primary-400 cursor-pointer italic py-2 border-primary-500 px-4 text-white flex justify-center items-center"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-3 mr-2 animate-pulse"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                        </svg>
                        Download</button>
                </div>

                @error('short')
                    <p class="m-2 italic text-sm text-red-600 dark:text-red-500 ">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </div>
    {{-- shorts list items::start --}}
    <div class="shorts">
        <div class="max-w-screen-xl mx-auto p-5 sm:p-6 md:p-8 lg:p-4 xl:p-5">
            <div class="text-center pb-8">
                <a href="#QNA">How to copy and download YouTube shorts? <span class="text-primary-500 font-bold">Click
                        here</span> </a>
            </div>
            <div id="shorts" data-token="{{ csrf_token() }}" data-load="{{ route('loadmore') }}" data-option="shorts"
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

    {{-- qna::start --}}
    <section class="container mt-8" id="QNA">
        <div class="container max-w-4xl lg:px-6 md:px-4 sm:px-3 px-3 py-10 mx-auto">
            <div class="text-center mt-9">
                <p class="text-sm leading-7 text-gray-500 font-regular">
                    Q.N.A
                </p>
                <h3
                    class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Questions And <span class="text-primary-600">Answer</span>
                </h3>
            </div>

            <div class="mt-20 space-y-8">

                {{-- howToCopy::start --}}
                <div x-data="{ howToCopy: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="howToCopy = ! howToCopy" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">How to Copy link for Youtube
                            Shorts Download?</h1>

                        <span x-show="howToCopy" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!howToCopy" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="howToCopy" class="relative lg:p-8 p-4">
                        <ul class="list-disc pl-3">
                            <li>Open the YouTube app.</li>
                            <li>Choose a Short video which you want to download.</li>
                            <li>Look at the bottom side “Share” option is seen, Click on it!</li>
                            <li>Now a popup comes with the Copy Link option. Copy it, Hurray Links Copied!</li>
                        </ul>
                    </div>
                </div>
                {{-- howToCopy::end --}}

                {{-- howtodownload::start --}}
                <div x-data="{ howToDownload: true }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="howToDownload = ! howToDownload"
                        class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">How to download Youtube Shorts?
                        </h1>

                        <span x-show="howToDownload" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!howToDownload" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="howToDownload" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-600 dark:text-gray-300 ">
                            For youtube shorts download, you have to follow these simple steps for your favorites short
                            video download.
                        </p>
                        <br>
                        <ul class="list-disc pl-3">
                            <li>Copy the link to the Shorts video that you want to save or download online.</li>
                            <li>Paste the link in the download shorts video input box on the homepage.</li>
                            <li>Click the “Download” button to being processed your video downloading.</li>
                            <li>Now, automaticly video will start download.</li>
                            <li>If download didn't start download automaticly and a new screen is open, there you see the
                                three dots, click on it and hit download.</li>
                            <li>When your shorts video download process is complete your browser tells you the video will be
                                downloaded.
                            </li>
                            <li>You can find the video in your gallery or also find the video in file management inside the
                            </li>
                            <li>Download folder or default folder which you use to save.</li>
                        </ul>
                    </div>
                </div>
                {{-- howtodownload::end --}}

                {{-- whatIsShorts::start --}}
                <div x-data="{ whatIsShorts: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="whatIsShorts = ! whatIsShorts"
                        class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">What is YouTube Shorts?</h1>

                        <span x-show="whatIsShorts" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!whatIsShorts" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="whatIsShorts" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            Youtube Shorts is a short video-making platform where users will create videos of 15 seconds or
                            less. Currently app in the early beta of Youtube shorts. YouTube Shorts a new short-form video
                            service that lets users create shorts video, the Shorts provide you the option to record with
                            music from the library of music, speed control, and timer and countdown to edit like a pro your
                            video. Shorts have upcoming features like-new cameras and a handful of editing tools that
                            rolling out over the next few weeks.
                            <br><br>
                            Shorts is a new way to express yourself and gain an audience. Every month, 2 billion viewers
                            come on YouTube to watch videos in all types of categories like entertainment, education,
                            technology so you have the opportunity to connect with them and gain your loyal fans. YouTube
                            says we will update more features according to customer feedback.
                            <br><br>
                            Shorts in currently in beta version and the early version offers services is available in India
                            for android users but YouTube launches Shorts soon in other countries also. YouTube Shorts is
                            currently available for android users and for iOS users it will available soon. YouTube says we
                            will update more features according to customer feedback.
                        </p>
                    </div>

                </div>
                {{-- whatIsShorts::end --}}

                {{-- howToCreateVideo::start --}}
                <div x-data="{ howToCreateVideo: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="howToCreateVideo = ! howToCreateVideo"
                        class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">How to create a YouTube shorts
                            video?</h1>

                        <span x-show="howToCreateVideo" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!howToCreateVideo" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="howToCreateVideo" class="relative lg:p-8 p-4">
                        <p class=" text-md text-gray-500 dark:text-gray-300">
                            YouTube makes it simple to create short videos you just have to open the YouTube app (updated
                            app). For creating a shots video hit the “+” icon (you find the icon inside the YouTube app at
                            the bottom).
                            <br>
                            <br>
                            Now you see the ‘Create a Short’ option hit on it, now your Shorts interface is open now you are
                            able to record your video. Shots allow you to use editing tools to do things like add music,
                            merge multiple video clips, speed controls, and timers for your video clip.
                        </p>
                    </div>
                </div>
                {{-- howToCreateVideo::end --}}

                {{-- interestingDetails::start --}}
                <div x-data="{ interestingDetails: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="interestingDetails = ! interestingDetails"
                        class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Interesting details about Shorts
                            video.
                        </h1>

                        <span x-show="interestingDetails" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!interestingDetails" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="interestingDetails" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            Shorts is a new short-form for creators and artists who want to shoot catchy videos in any
                            category with their mobile phones. Shorts have focused on building their foundation across three
                            main areas.
                        </p>
                        <br>
                        <ul class="list-disc pl-3">
                            <li><b class="text-primary-500">Create :</b> Creating or shooting video easy and introducing
                                new
                                tools for creators and
                                artists with these early beta Shorts. Shorts provide you multi-segment camera to strings
                                video clips together, record with music, etc.</li>
                            <li><b class="text-primary-500">Get Discovered :</b> Connect with the Shorts of YouTube 2
                                billion viewers and built
                                entire
                                businesses and also providing the platform for mobile creators to grow a community on
                                Youtube with shorts</li>
                            <li><b class="text-primary-500">Watch :</b> YouTube has seen some videos recently on the
                                homepage in vertical format. You
                                can change the new video by swiping up from one video to the next video, plus discover other
                                similar shorts video.</li>
                        </ul>
                    </div>
                </div>
                {{-- interestingDetails::end --}}

                {{-- downloadIsLegal::start --}}
                <div x-data="{ downloadIsLegal: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="downloadIsLegal = ! downloadIsLegal"
                        class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Download Youtube Shorts is legal?
                        </h1>

                        <span x-show="downloadIsLegal" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!downloadIsLegal" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="downloadIsLegal" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            Downloading a Youtube video is always breaches the YouTube guidelines before downloading the
                            video you read carefully all the guidelines. We did not have any right to any video or images
                            all the credit or ownership goes to YouTube and its creators.
                            <br>
                            <br>
                            Read the YouTube guidelines –> <a class="text-primary-500" target="_blank"
                                rel="noopener noreferrer"
                                href="https://www.youtube.com/static?gl=US&template=terms">YouTube’s Terms of Service</a>
                        </p>
                    </div>
                </div>
                {{-- downloadIsLegal::end --}}

                {{-- termsAndCondition::start --}}
                <div x-data="{ termsAndCondition: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="termsAndCondition = ! termsAndCondition"
                        class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Term and Condition
                        </h1>

                        <span x-show="termsAndCondition" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!termsAndCondition" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="termsAndCondition" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            This site is for educational purposes, <a class="text-primary-500"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> have not any right
                            to videos, photos, or
                            any images. All the right goes to the original creators or YouTube. The site is using only
                            freely available information. YouTube and YouTube logos are the trademark and copyright of
                            Google.
                        </p>
                    </div>
                </div>
                {{-- termsAndCondition::end --}}


                <div class="border-2 bg-red-500/30 border-gray-100 rounded-lg dark:border-gray-700">
                    <div class="relative lg:p-8 p-4">
                        <p class="text-md font-normal text-gray-900 dark:text-white">
                            This site is for educational purposes, <a class="text-primary-500 hover:underline font-bold"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> is not affiliated with
                            YouTube,
                            and we do not host any video, photos, or any media on our server all the media delivered through
                            YouTube API and all the right goes to its respective owners. <a
                                class="text-primary-500 hover:underline font-bold"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> have not any right
                            to videos, photos, or
                            any images. All the right goes to the original creators or YouTube. The site is using only
                            freely available information. YouTube and YouTube logos are the trademark and copyright of
                            Google.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- qna::end --}}

@endsection
