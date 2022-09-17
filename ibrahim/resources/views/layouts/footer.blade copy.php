   <footer
       class=" bg-white dark:bg-gray-900 pb-2 text-sm leading-6 divide-y divide-gray-200 dark:divide-gray-800 border-t border-gray-200 dark:border-gray-800 pt-10">
       <div class="max-w-7xl mx-auto  divide-slate-200 px-4 sm:px-6 md:px-8 dark:divide-slate-700">
           <div class="flex">
               <div class="flex-none w-1/2 space-y-10 sm:space-y-8 lg:flex lg:space-y-0">
                   <div class="lg:flex-none lg:w-1/2">
                       <h2 class="font-semibold text-gray-900 dark:text-gray-100">Getting Started</h2>
                       <ul class="mt-3 space-y-2">
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="/docs/installation">Installation</a></li>
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/editor-setup">Editor
                                   Setup</a></li>
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="/docs/browser-support">Browser
                                   Support</a></li>
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="/docs/upgrade-guide">Upgrade
                                   Guide</a></li>
                       </ul>
                   </div>
                   <div class="lg:flex-none lg:w-1/2">
                       <h2 class="font-semibold text-gray-900 dark:text-gray-100">Core Concepts</h2>
                       <ul class="mt-3 space-y-2">
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/dark-mode">Dark
                                   Mode</a></li>
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="/docs/reusing-styles">Reusing
                                   Styles</a></li>
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="/docs/adding-custom-styles">Adding Custom Styles</a></li>
                           <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="/docs/functions-and-directives">Functions &amp; Directives</a></li>
                       </ul>
                   </div>
               </div>
               <div class="flex-none w-1/2 space-y-10 sm:space-y-8 lg:flex lg:space-y-0">
                   {{-- pages --}}
                   <div class="lg:flex-none lg:w-1/2">
                       <h2 class="font-semibold text-gray-900 dark:text-gray-100">Support</h2>
                       <ul class="mt-3 space-y-2">
                           <li>
                               <a href="{{ route('page.terms') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Terms
                                   and Conditions</a>
                           </li>
                           <li>
                               <a href="{{ route('page.contact') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Contact Us</a>
                           </li>
                           <li>
                               <a href="{{ route('page.privacy') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Privacy
                                   Policy</a>
                           </li>
                           <li>
                               <a href="{{ route('page.advertising') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">Advertising</a>
                           </li>
                           <li>
                               <a href="{{ route('page.faq') }}"
                                   class="hover:text-gray-900 dark:hover:text-gray-300">FAQ</a>
                           </li>
                       </ul>
                   </div>

                   {{-- comunity --}}
                   <div class="lg:flex-none lg:w-1/2">
                       <h2 class="font-semibold text-gray-900 dark:text-gray-100">Community</h2>
                       <ul class="mt-3 space-y-2">
                           <li>
                               <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="https://facebook.com/CryptoGainersIO" target="_blank">Facebook</a>
                           </li>
                           <li>
                               <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="https://twitter.com/CryptoGainersIO" target="_blank">Twitter</a>
                           </li>
                           <li>
                               <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="https://www.instagram.com/cryptogainers.io/" target="_blank">Instagram</a>
                           </li>
                           <li>
                               <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                   href="https://www.pinterest.com/cryptogainersio" target="_blank">Pinterest</a>
                           </li>

                       </ul>
                   </div>
               </div>
           </div>
       </div>

       {{-- copyright --}}
       <div class="mt-10 pt-2 bg-white dark:bg-gray-900">
           <div class="container flex justify-center items-center">
               <span class="flex py-2 pointer-events-none">
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
   </footer>
