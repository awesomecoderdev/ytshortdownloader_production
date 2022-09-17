@php
$haveDownloads = false;
$othersDownloads = false;
@endphp

{{-- <div
    class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-red-500/25 supports-backdrop-blur:bg-white/60 dark:bg-red-800/20 backdrop-saturate-150">
    <p
        class="flex lg:flex-row flex-col justify-between items-center text-gray-900 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="animate-pulse h-8 w-8 text-red-500 dark:text-red-600 "
            viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                clip-rule="evenodd" />
        </svg>
        <span class="lg:pb-0 pb-2 ml-2">
            <a href="{{ route('page.index') }}" class="text-primary-500">ytshortdownloader.com</a> have not any right
            to
            videos, photos, or
            any images. All the right goes to the
            original creators or YouTube.
        </span>

    </p>
</div> --}}
@if (isset($downloads) && !empty($downloads))
    {{-- formats::start --}}
    @isset($downloads->formats)
        @foreach ($downloads->formats as $i => $item)
            @isset($item->url)
                @php $haveDownloads = true; @endphp
                @php $othersDownloads = true; @endphp
                <div
                    class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                    <a class="flex lg:flex-row flex-col justify-between items-center text-gray-900 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 "
                        href="{{ "$item->url&title=Yt Short Downloader - " . ucfirst($short->title) }}" target="_blank">
                        <span class="lg:pb-0 pb-2 truncate max-w-sm">
                            {{ limitString($short->title, 40) }}
                        </span>
                        <div class="relative flex flex-wrap">
                            {{-- height width --}}
                            @if (isset($item->height) && isset($item->width))
                                <span
                                    class="flex md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    {{ "$item->height x $item->width" }}
                                </span>
                            @endif
                            {{-- video ext --}}
                            @isset($item->mimeType)
                                @if (isVideo($item->mimeType))
                                    <span
                                        class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                        {{ fileExt($item->mimeType) ? fileExt($item->mimeType) : '' }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4 text-primary-500 dark:text-white"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                        </svg>
                                    </span>
                                @else
                                    <span
                                        class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                        {{ fileExt($item->mimeType) ? fileExt($item->mimeType) : '' }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4 text-primary-500 dark:text-white"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            @endisset
                            {{-- audio channel --}}
                            @isset($item->audioChannels)
                                <span
                                    class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-500 dark:text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @else
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500/90 " viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endisset
                            {{-- video quality --}}
                            @isset($item->qualityLabel)
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    {{ $item->qualityLabel }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 text-gray-500 dark:text-white h-auto w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                    </svg>
                                </span>
                            @else
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 dark:text-white h-auto w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                    </svg>
                                </span>
                            @endisset
                        </div>
                    </a>
                </div>
            @endisset
        @endforeach
    @endisset
    {{-- formats::start --}}
    {{-- adaptive::start --}}
    @isset($downloads->adaptiveFormats)
        @foreach ($downloads->adaptiveFormats as $item)
            @isset($item->url)
                @php $haveDownloads = true; @endphp
                @php $othersDownloads = true; @endphp
                <div
                    class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                    <a class="flex lg:flex-row flex-col justify-between items-center text-gray-900 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 "
                        href="{{ "$item->url&title=Yt Short Downloader - " . ucfirst($short->title) }}" target="_blank">
                        <span class="lg:pb-0 pb-2">
                            {{ limitString($short->title, 40) }}
                        </span>

                        <div class="relative flex flex-wrap">
                            {{-- height width --}}
                            @if (isset($item->height) && isset($item->width))
                                <span
                                    class="flex md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    {{ "$item->height x $item->width" }}
                                </span>
                            @endif
                            {{-- video ext --}}
                            @isset($item->mimeType)
                                @if (isVideo($item->mimeType))
                                    <span
                                        class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                        {{ fileExt($item->mimeType) ? fileExt($item->mimeType) : '' }}
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="ml-2 h-4 w-4 text-primary-500 dark:text-white" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                        </svg>
                                    </span>
                                @else
                                    <span
                                        class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                        {{ fileExt($item->mimeType) ? fileExt($item->mimeType) : '' }}
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="ml-2 h-4 w-4 text-primary-500 dark:text-white" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            @endisset
                            {{-- audio channel --}}
                            @isset($item->audioChannels)
                                <span
                                    class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-500 dark:text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @else
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500/90 " viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endisset
                            {{-- video quality --}}
                            @isset($item->qualityLabel)
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    {{ $item->qualityLabel }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 text-gray-500 dark:text-white h-auto w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                    </svg>
                                </span>
                            @else
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 dark:text-white h-auto w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                    </svg>
                                </span>
                            @endisset
                        </div>
                    </a>
                </div>
            @endisset
        @endforeach
    @endisset
    {{-- adaptive::end --}}
@endif

@if (!$haveDownloads)
    @if (isset($others) && !empty($others))
        {{-- formats::start --}}
        @foreach ($others as $i => $item)
            @if (isset($item->url) && $item->url != null)
                @php $othersDownloads = true; @endphp
                <div
                    class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
                    <a class="flex lg:flex-row flex-col justify-between items-center text-gray-900 dark:text-white font-medium md:text-sm text-sm leading-snughover:text-indigo-600 "
                        href="{{ "$item->url&title=Yt Short Downloader - " . ucfirst($short->title) }}"
                        target="_blank">
                        <span class="lg:pb-0 pb-2 truncate max-w-sm">
                            {{ limitString($short->title, 40) }}
                        </span>
                        <div class="relative flex flex-wrap">
                            {{-- height width --}}
                            @if (isset($item->height) && isset($item->width))
                                <span
                                    class="flex md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    {{ "$item->height x $item->width" }}
                                </span>
                            @endif
                            {{-- video ext --}}
                            @isset($item->label)
                                @if (othersVideoType($item->label))
                                    <span
                                        class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                        {{ othersVideoType($item->label) ? othersVideoType($item->label) : '' }}
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="ml-2 h-4 w-4 text-primary-500 dark:text-white" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                        </svg>
                                    </span>
                                @else
                                    <span
                                        class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-primary-500 dark:text-white" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                        </svg>
                                    </span>
                                @endif
                            @endisset
                            {{-- audio channel --}}
                            <span
                                class="md:mt-0 mt-2 ml-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-500 dark:text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            {{-- video quality --}}
                            @isset($item->quality)
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    {{ $item->quality }}
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="ml-2 text-gray-500 dark:text-white h-auto w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                    </svg>
                                </span>
                            @else
                                <span
                                    class="ml-2 md:mt-0 mt-2 text-xs leading-5 font-semibold bg-slate-400/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-400/20 dark:highlight-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 dark:text-white h-auto w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1.586l-.293-.293a1 1 0 10-1.414 1.414l2 2 .002.002a.997.997 0 001.41 0l.002-.002 2-2a1 1 0 00-1.414-1.414l-.293.293V9z" />
                                    </svg>
                                </span>
                            @endisset
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
        {{-- formats::start --}}
    @endif
@endif

@if (!$othersDownloads)
    {{-- notdownloaded::start --}}
    <div
        class=" border dark:border-primary-200/10 overflow-hidden relative mb-3 p-3 shadow-lg drop-shadow-sm  rounded-md bg-white/75 supports-backdrop-blur:bg-white/60 dark:bg-gray-800/70 backdrop-saturate-150">
        <div
            class="flex lg:flex-row flex-col justify-between items-center text-red-500 dark:text-red-500 font-medium md:text-sm text-sm leading-snughover:text-indigo-600 ">
            <p class="lg:pb-0 flex relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="animate-pulse h-5 w-5 dark:text-red-800 "
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                <span class="px-2">
                    {{ __("Sorry, You can't download this video.") }}
                </span>
            </p>
        </div>
    </div>
    {{-- notdownloaded::end --}}
@endif
