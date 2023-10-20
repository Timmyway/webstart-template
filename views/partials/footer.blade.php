<footer class="mt-auto p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl text-center">
        <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">            
            <img class="h-16 rounded shadow-lg" src="{{ asset('images/logo-dark.WebP') }}" alt="logo">
        </a>
        <p class="my-6 text-gray-500 dark:text-gray-400">
            Lite is a powerful, lightweight, and professional PHP framework designed for developers who demand simplicity, flexibility, and performance.    
        </p>
        <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
            <li>
                <a href="{{ route('profile') }}" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>            
        </ul>
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ now()->format('Y') }} <a href="#" class="hover:underline">Timmyway™</a>. All Rights Reserved.</span>
    </div>
  </footer>