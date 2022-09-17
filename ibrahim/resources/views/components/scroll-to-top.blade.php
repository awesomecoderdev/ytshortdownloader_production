<button x-show="scrollBackTop" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform opacity-0 scale-95 translate-y-5"
    x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
    x-transition:leave-end="transform opacity-0 scale-95 translate-y-5"
    x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
    x-on:click="document.body.scrollTop = 0; document.documentElement.scrollTop = 0;" aria-label=" Back to top"
    class=" rounded-full fixed bottom-0 right-0 p-2 lg:m-10 m-5  text-white dark:text-primary-400 bg-primary-400/80 hover:bg-primary-400/95 dark:bg-slate-600/80 hover:dark:bg-slate-600/95 transition-all focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
            d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
            clip-rule="evenodd" />
    </svg>
</button>
