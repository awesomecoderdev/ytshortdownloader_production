{{-- index file --}}
@extends('layouts.app')

{{-- title --}}
@section('title', 'Advertising')

@section('description', 'Please read carefully if you are interested in advertising with us.')
@section('url'){{ route('page.contact') }}@endsection
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
    "name": "Advertising",
    "alternateName": "Advertising",
    "url": "{{ route('page.contact') }}"
    }
@endsection
{{-- content --}}
@section('content')
    <section class="container my-8">
        <div class="container max-w-5xl px-4 py-10 mx-auto">
            <div class="text-center">
                <p class="text-sm leading-7 text-gray-500 font-regular">
                    Advertise
                </p>
                <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Advertise <span class="text-primary-600">With Us</span>
                </h3>
            </div>

            <div class="mt-8 space-y-8">
                <p class="my-4  text-slate-700 dark:text-gray-200 whitespace-pre-line relative">
                    You can Advertise with us by Putting a banner (Image, Gif or Video) at any place that you want.we will
                    hyperlink that banner to your channel or video and we will remove any other ad for that duration. We
                    will put your ad between 12 pm to 4 pm till the next 24 hours.
                    We charge on a daily basis if you want to advertise more than one day then mention in mail, we will
                    negotiate on a discounted price.
                    <br>
                    We charge 20$ per day.
                    <br>
                    <b>Note :</b> Any customization is available related to advertisement according to your need.
                    <br>
                    For any query or suggestion. Leave a mail-back to us!
                    <br>
                    Thank You,
                    <br>
                    Stay Connected with us!
                    <br>
                    ytshortdownloader.com@gmail.com
                    <br>
                    <a class="text-primary-600 dark:text-white dark:underline max-w-sm whitespace-pre-line font-bold italic"
                        href="mailto:ytshortdownloader.com@gmail.com" target="_blank" rel="noopener noreferrer">Email Us</a>

                </p>
            </div>
        </div>
    </section>
@endsection
