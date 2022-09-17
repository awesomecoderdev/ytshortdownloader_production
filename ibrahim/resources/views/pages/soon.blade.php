@extends('layouts.app')

{{-- title --}}
@section('title', 'Comming Soon')

@section('content')
    <!-- Component Code -->
    <div class="relative h-screen w-full flex items-center justify-center bg-cover bg-center text-center text-white"
        style="background-image:url(https://images.pexels.com/photos/260689/pexels-photo-260689.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500);">
        <div class="absolute top-0 right-0 bottom-0 left-0 bg-gray-900 opacity-75"></div>

        <div class="z-10 grid grid-cols-1 sm:grid-cols-2 gap-10 max-w-3xl mx-auto" x-data="timer()"
            x-init="countdown()">

            <div class="sm:border-r-2">
                <div class="flex items-end">
                    <div class="">
                        <div class="border text-center h-24 w-24 flex items-center justify-center">
                            <div>
                                <p class="">Hours</p>
                                <p class="text-xl sm:text-2xl font-bold" x-text="hours"></p>
                            </div>
                        </div>

                        <div class="bg-white text-gray-900 text-center h-24 w-24 flex items-center justify-center">
                            <div>
                                <p class="">Mins</p>
                                <p class="text-xl sm:text-2xl font-bold" x-text="minutes"></p>
                            </div>
                        </div>

                        <div class="bg-primary-600 text-center h-24 w-24 flex items-center justify-center">
                            <div>
                                <p class="">Seconds</p>
                                <p class="text-xl sm:text-3xl font-bold" x-text="seconds"></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 text-center h-48 w-48 flex items-center justify-center">
                        <div>
                            <p class="">Days</p>
                            <p class="text-xl sm:text-3xl font-bold" x-text="days"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-left mt-6">
                <div class="mb-4 text-white">
                    <svg height="35px" class="mb-2" fill="currentColor" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 32 32" xml:space="preserve">
                        <g>
                            <g id="right_x5F_quote">
                                <g>
                                    <path d="M0,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H0z" />
                                    <path d="M20,4v12h8c0,4.41-3.586,8-8,8v4c6.617,0,12-5.383,12-12V4H20z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p class="mt-2 text-base leading-6">
                        We love to create dependable business solutions for
                        companies of all sizes and any industry. Our goal is
                        to improve accuracy and efficiency to reduce
                        operational costs
                    </p>
                    <div class="text-sm mt-5">
                        <a href="https://awesomecoder.org/" target="_blank"
                            class="font-medium leading-none text-primary-600 hover:text-white transition duration-500 ease-in-out">MD
                            Ibrahim Kholil</a>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('styles')
    <script>
        function timer() {
            return {
                days: "00",
                hours: "00",
                minutes: "00",
                seconds: "00",
                endTime: new Date(
                    "June 31, 2022 23:59:59 GMT+0530"
                ).getTime(),
                now: new Date().getTime(),
                timeLeft: 0,
                countdown: function() {
                    let counter = setInterval(() => {
                        this.now = new Date().getTime();
                        this.timeLeft = (this.endTime - this.now) / 1000;
                        this.seconds = this.format(this.timeLeft % 60);
                        this.minutes = this.format(this.timeLeft / 60) % 60;
                        this.hours =
                            this.format(this.timeLeft / (60 * 60)) % 24;
                        this.days = this.format(
                            this.timeLeft / (60 * 60 * 24)
                        );
                        if (this.timeLeft <= 0) {
                            clearInterval(counter);
                            this.seconds = "00";
                            this.minutes = "00";
                            this.hours = "00";
                            this.days = "00";
                        }
                    }, 1000);
                },
                format: function(value) {
                    if (value < 10) {
                        return "0" + Math.floor(value);
                    } else return Math.floor(value);
                },
            };
        }
    </script>
@endsection
