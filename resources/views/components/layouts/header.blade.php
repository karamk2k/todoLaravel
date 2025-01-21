
<div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-900">
  <header class="absolute inset-x-0 top-0 z-50">
      <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
              <a href="#" class="-m-1.5 p-1.5">
                  <span class="sr-only">Todo</span>
                  <img class="h-8 w-auto" src="https://img.icons8.com/nolan/64/todo-list.png" alt="">
              </a>
          </div>
          <div class="flex lg:hidden">
              <button type="button"
                  class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-800 dark:text-white">
                  <span class="sr-only">Open main menu</span>
                  <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                      aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
              </button>
          </div>
          <div class="hidden lg:flex lg:gap-x-12">
              <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white transition">Home</a>
              <a href="{{ route('createtodo') }}" class="text-sm font-semibold text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white transition">Create Todo</a>
          </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
              <a href="{{ route('logout') }}"
                  class="text-sm font-semibold text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300 transition">Log out <span
                      aria-hidden="true">&rarr;</span></a>
          </div>
      </nav>
  </header>
</div>
