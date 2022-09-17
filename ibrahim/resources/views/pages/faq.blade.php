{{-- index file --}}
@extends('layouts.app')

{{-- title --}}
@section('title', 'FAQ')

{{-- meta data --}}
@section('description', 'Frequenly Asked Questions (FAQ)')
@section('url'){{ route('page.faq') }}@endsection
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
    "name": "FAQ",
    "alternateName": "FAQ",
    "url": "{{ route('page.faq') }}"
    }
@endsection


{{-- content --}}
@section('content')
    <section class="container my-8">
        <div class="container max-w-4xl px-4 py-10 mx-auto">
            <div class="text-center">
                <p class="text-sm leading-7 text-gray-500 font-regular">
                    F.A.Q
                </p>
                <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Frequently Asked <span class="text-primary-600">Questions</span>
                </h3>
            </div>

            <div class="mt-20 space-y-8">
                <div x-data="{ faq1: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq1 = ! faq1" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">How can I download youtube shorts
                            videos?
                        </h1>

                        <span x-show="faq1" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq1" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq1" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            For <a class="text-primary-500" href="{{ route('page.index') }}">youtube shorts download</a>
                            in your mobile, ios, or pc drive. Visit shorts downloader <a class="text-primary-500"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> and
                            paste the copied link inside
                            the input box of that YouTube shorts video that
                            you want to download and hit the download button for being processed your downloading. This is a
                            free and the best easy way to download short video online.
                        </p>
                    </div>
                </div>

                <div x-data="{ faq2: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq2 = ! faq2" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">YouTube Short Video Download
                            Limits?</h1>

                        <span x-show="faq2" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq2" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq2" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            Feel free with youtube shorts downloader online, there is no limitation of any kind to download
                            YouTube short video. Youtube shorts downloader tool always feels happy to giving our services to
                            our respected user continuously, our target is providing easy downloading of any kind of Youtube
                            shorts video download online.
                        </p>
                    </div>

                </div>

                <div x-data="{ faq3: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq3 = ! faq3" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Did we download any app to watch
                            the shorts video?</h1>

                        <span x-show="faq3" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq3" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq3" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            No, you did not need to install any application for Shorts videos, YouTube launches Shorts
                            inside the YouTube application. To access the Shorts video you just open YouTube and scroll down
                            there are new videos coming in vertical long format click on it and watch it, swipe up for more
                            Shorts video content.
                        </p>
                    </div>
                </div>

                <div x-data="{ faq4: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq4 = ! faq4" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Where can I find a short video
                            option inside the YouTube?</h1>

                        <span x-show="faq4" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq4" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq4" class="relative lg:p-8 p-4">
                        <p class=" text-md text-gray-500 dark:text-gray-300">
                            Currently, Shorts in early beta, YouTube will keep updated in the next few week and month with
                            more new features as well as more ways to discover Shorts. So wait for it now! Right now you can
                            access shorts inside the YouTube app at the top side options.
                        </p>
                    </div>
                </div>

                <div x-data="{ faq5: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq5 = ! faq5" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">How I upload or shoot YouTube
                            shorts video?
                        </h1>

                        <span x-show="faq5" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq5" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq5" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            For creating or shoot Shorts video you just open the YouTube app and hit the ‘+’ sign and choose
                            ‘create a shorts’ and hit it. New interface is open now click on the record button and shoot
                            your shorts video. You can also use shorts feature like music library or speed controls and
                            timers.
                        </p>
                    </div>
                </div>

                <div x-data="{ faq6: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq6 = ! faq6" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">YouTube Shorts Download in HD?
                        </h1>

                        <span x-show="faq6" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq6" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq6" class="relative lg:p-8 p-4">
                        <p class="text-md text-gray-500 dark:text-gray-300">
                            The quality of any short video is depending on the quality of upload’s the video. If the video
                            creator uploads yt short video in High Quality then the shorts downloader easily crawls the
                            shorts video and provides you the original high-quality Youtube shorts video downloading link in
                            its original uploads shorts video hd download quality.
                        </p>
                    </div>
                </div>

                <div x-data="{ faq7: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq7 = ! faq7" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Download Youtube Shorts is legal?
                        </h1>

                        <span x-show="faq7" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq7" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq7" class="relative lg:p-8 p-4">
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

                <div x-data="{ faq8: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq8 = ! faq8" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Term and Condition
                        </h1>

                        <span x-show="faq8" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq8" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq8" class="relative lg:p-8 p-4">
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


                <div class="border-2 bg-red-500/30 border-gray-100 rounded-lg dark:border-gray-700">
                    <div class="relative lg:p-8 p-4">
                        <p class="text-md font-normal text-gray-900 dark:text-white">
                            This site is for educational purposes, <a class="text-primary-500 hover:underline font-bold"
                                href="{{ route('page.index') }}">ytshortdownloader.com</a> is not affiliated with YouTube,
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
@endsection
