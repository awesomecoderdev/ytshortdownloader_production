   <footer
       class=" bg-white dark:bg-gray-900 pb-2 text-sm leading-6 divide-y divide-gray-200 dark:divide-gray-800 border-t border-gray-200 dark:border-gray-800 pt-10">

       <div class="my-4 pb-10 max-w-7xl mx-auto  divide-slate-200 px-4 sm:px-6 md:px-8 dark:divide-slate-700">
           <div class="flex md:flex-row flex-col">
               <div class=" flex-none  md:w-1/2 w-full space-y-10 sm:space-y-8 lg:flex lg:space-y-0">
                   <div class="lg:flex-none lg:w-full lg:pr-12">
                       <span class="flex pb-2 mx-1 pointer-events-none">
                           <span class="tracking-wide text-gray-500 dark:text-primary-50 font-bold text-md">Yt</span>
                           <svg viewBox="0 0 24 24" class="h-6 w-6 text-red-500 dark:text-primary-50">
                               <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24">
                                   <path
                                       d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z">
                                   </path>
                               </g>
                           </svg>
                           <span
                               class="tracking-wide text-primary-500/80 dark:text-primary-50 font-bold text-md">Downloader</span>
                       </span>
                       <p class="mr-8 md:mb-0 mb-8">
                           Best free tool for Youtube shorts download online in HD quality. Paste the video link in the
                           shorts downloader input box and hit the download button to process.
                       </p>
                   </div>
               </div>
               <div class="flex-none md:w-1/2 w-full space-y-10 sm:space-y-8 md:flex justify-between md:space-y-0">
                   {{-- pages --}}
                   <div class="lg:flex-none lg:w-1/2">
                       <h2 class="font-semibold text-gray-900 dark:text-gray-100">Support</h2>
                       <ul class="mt-3 space-y-2">
                           <li>
                               <a href="{{ route('page.contact') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Contact Us</a>
                           </li>
                           <li>
                               <a href="{{ route('page.advertising') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Advertising</a>
                           </li>
                       </ul>
                   </div>

                   {{-- comunity --}}
                   <div class="lg:flex-none lg:w-1/2">
                       <h2 class="font-semibold text-gray-900 dark:text-gray-100">Pages</h2>
                       <ul class="mt-3 space-y-2">
                           <li>
                               <a href="{{ route('page.terms') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Terms
                                   and Conditions</a>
                           </li>
                           <li>
                               <a href="{{ route('page.privacy') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Privacy
                                   Policy</a>
                           </li>
                           <li>
                               <a href="{{ route('page.faq') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">FAQ</a>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>

       {{-- copyright::start --}}
       <div class=" pt-2 bg-white dark:bg-gray-900">
           <div class="container flex justify-center items-center md:flex-row flex-col cursor-text">
               <span>Copyright © {{ date('Y') }}</span>
               <span class="flex py-2 mx-1 pointer-events-none">
                   <span class="tracking-wide text-gray-500 dark:text-primary-50 font-bold text-md">Yt</span>
                   <svg viewBox="0 0 24 24" class="h-6 w-6 text-red-500 dark:text-primary-50">
                       <g height="24" viewBox="0 0 24 24" fill="currentColor" width="24">
                           <path
                               d="M17.77 10.32c-.77-.32-1.2-.5-1.2-.5L18 9.06c1.84-.96 2.53-3.23 1.56-5.06s-3.24-2.53-5.07-1.56L6 6.94c-1.29.68-2.07 2.04-2 3.49.07 1.42.93 2.67 2.22 3.25.03.01 1.2.5 1.2.5L6 14.93c-1.83.97-2.53 3.24-1.56 5.07.97 1.83 3.24 2.53 5.07 1.56l8.5-4.5c1.29-.68 2.06-2.04 1.99-3.49-.07-1.42-.94-2.68-2.23-3.25zM10 14.65v-5.3L15 12l-5 2.65z">
                           </path>
                       </g>
                   </svg>
                   <span
                       class="tracking-wide text-primary-500/80 dark:text-primary-50 font-bold text-md">Downloader</span>
               </span>
           </div>
       </div>
       {{-- copyright::end --}}
   </footer>
