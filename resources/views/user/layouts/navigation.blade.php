<nav 
class="z-0 relative" 
x-data="{open:false,menu:false, lokasi:false}">
  <div class="relative z-10 bg-indigo-700 shadow">
    <div class="max-w-8xl mx-auto px-2 sm:px-4 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex items-center px-2 lg:px-0">
          <a class="flex-shrink-0 text-gray-50 hover:text-indigo-50 hover-bg-indigo-500" href="/">
            Amazing.co.jp
          </a>
        </div>
        <div class="flex flex-1 justify-end items-center px-2 lg:px-0">
          <div class="max-w-lg w-full lg:max-w-xs">
            <label for="search" class="sr-only">Search </label>
            <form methode="get" action="/search" class="relative z-50">
              <button type="submit" id="searchsubmit" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </button>
              <input type="text" name="words" id="s" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-indigo-100 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out" placeholder="検索">
            </form>
          </div>

          <div class="hidden lg:block lg:ml-2">
            <div class="flex">
                <button type="button" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"> 
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"></path>
                  </svg>
                  カテゴリ 
                </button>
              @auth
                <a href="#" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 ">
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                  </svg>
                  カート 
                </a>
                <a href="#" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> 
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                  </svg>
                  注文履歴
                </a>
                <a href="#" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> 
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  マイページ 
                </a>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500   hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> 
                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3  3H9"></path>
                    </svg>
                    ログアウト 
                  </button>
                </form>
              @else
                <a href="#" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> 
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
                  </svg>
                  カート 
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 ">
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"></path>
                  </svg>
                  会員登録 
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center ml-4 pl-2 pr-3 py-2 rounded-md text-sm leading-5 font-medium text-indigo-50 no-underline font-semibold hover:bg-indigo-500 hover:text-white transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700 "> 
                  <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                  </svg>
                  ログイン
                </a>
              @endauth
            </div>
          </div>
        </div>
        <div class="flex lg:hidden">
          <button @click="menu=!menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div x-show="menu" class="block lg:hidden">
      <div class="px-2 pt-2 pb-3">
          <button type="button" class="mt-1 w-100 text-left block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">カテゴリ </button>
        @auth
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">カート </a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">注文履歴 </a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">マイページ </a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">ログアウト </a>
        @else
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">カート </a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">会員登録 </a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-white font-semibold font-medium hover:bg-indigo-500 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">ログイン </a>
        @endauth
      </div>
    </div>
  </div>
</nav>