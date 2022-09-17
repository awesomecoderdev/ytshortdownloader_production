{{-- index file --}}
@extends('layouts.app')

{{-- title --}}
@section('title', 'Contact Us')

@section('description',
    'If you have any query or suggestion mail us. Email id – ytshortdownloader.com@gmail.com Feel
    free to contact us! ',)
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
    "name": "Contact Us",
    "alternateName": "Contact Us",
    "url": "{{ route('page.contact') }}"
    }
@endsection

{{-- content --}}
@section('content')
    <div class="max-w-screen-md mx-auto p-5">
        <div class="text-center mb-16">
            <p class="mt-4 text-sm leading-7 text-gray-500 font-regular uppercase">
                Contact
            </p>
            <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-slate-900 dark:text-white">
                Get In <span class="text-primary-600">Touch</span>
            </h3>
        </div>

        @if (Session::has('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full"
                role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                    class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                    </path>
                </svg>
                {{ Session::get('success') }}
            </div>
        @endif

        <form class="w-full" method="POST" action="{{ route('message.store') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 dark:text-white text-xs font-bold mb-2"
                        for="grid-name">
                        Your Name
                    </label>
                    <input name="name"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-name" type="text" value="{{ old('name') }}" placeholder="Your Name...">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 dark:text-white text-xs font-bold mb-2"
                        for="grid-email">
                        Email Address
                    </label>
                    <input name="email"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @else border-gray-200 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="email" value="{{ old('email') }}" placeholder="Your email address">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 dark:text-white text-xs font-bold mb-2"
                        for="grid-message">
                        Your Message
                    </label>
                    <textarea rows="10" name="message" id="grid-message" placeholder="Write something ..."
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('message') border-red-500 @else border-gray-200 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end w-full px-3">
                    <button
                        class="shadow bg-primary-600 hover:bg-primary-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded"
                        type="submit">
                        Send Message
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
