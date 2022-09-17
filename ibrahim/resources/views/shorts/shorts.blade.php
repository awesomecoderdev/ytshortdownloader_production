{{-- shorts list items::start --}}
@empty(!$shorts)
    @foreach ($shorts as $short)
        <div class="shortsItem shadow-lg drop-shadow-lg relative h-96 w-full  flex items-end justify-start text-left bg-cover bg-center rounded-xl overflow-hidden"
            style="background-image:url({{ end($short->thumbnails)->url }});">
            <div class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
            </div>
            <div class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">
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
                        @if ($short->downloaded != null && downloaded($short->downloaded))
                            <span class=" border-l border-primary-500/50 pl-2 ml-2 flex items-center justify-center">
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
    @endforeach
@endempty
{{-- shorts list items::end --}}
