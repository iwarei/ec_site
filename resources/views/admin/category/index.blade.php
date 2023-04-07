<x-app-layout>
  {{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-0">
      カテゴリ一覧
    </h2>
  </x-slot> --}}
  
  <section class="container my-3 p-4 mx-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="sm:flex sm:items-center sm:justify-between">
      <div>
        <div class="flex items-center gap-x-3">
          <h2 class="text-lg font-medium text-gray-800 dark:text-white">カテゴリ一覧</h2>
  
          <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 vendors</span>
        </div>
  
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">登録されているカテゴリ一覧です。</p>
      </div>
  
      <div class="flex items-center mt-4 gap-x-3">
        <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
  
          <span>カテゴリを追加</span>
        </button>
      </div>
    </div>
  
    <div class="mt-3 md:flex md:items-center md:justify-end">
      <div class="relative flex items-center mt-1 md:mt-0">
        <span class="absolute">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
        </span>
  
        <input type="text" value="Stripe" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
      </div>
    </div>
  
    <div class="flex items-center mt-6 text-center border rounded-lg h-96 dark:border-gray-700">
      <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
        @forelse ($categories as $i -> $category)
          @if ($i == 0) 
            <table class="table-auto">
              <thead>
                <tr>
                  <th>公開状態</th>
                  <th>カテゴリ名</th>
                  <th>商品名</th>
                  <th>価格</th>
                  <th>在庫数</th>
                  <th>販売数</th>
                </tr>
              </thead>
              <tbody>        
          @endif
              <tr>
                {{-- 公開状態 --}}
                <th> 
                  @if($categories->publish_flg) 
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900       dark:text-green-300">公開中</span>
                  @else
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900      dark:text-purple-300">非公開中</span>
                  @endif
                </th>
                {{-- カテゴリ名 --}}
                <th></th>
                {{-- 商品名 --}}
                <th>
                  {{ $category->name }}
                </th>
                {{-- 価格 --}}
                <th>
                  {{ $category->price }}
                </th>
                {{-- 在庫数 --}}
                <th>
                  {{ $category->inventory }}
                </th>
              </tr>
          @if(count($categories) == $i + 1)
              </tbody>
            </table>
          @endif
        @empty
          <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full dark:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
          </svg>
          </div>
          <h1 class="mt-3 text-lg text-gray-800 dark:text-white">カテゴリが登録されていません</h1>
          <p class="mt-2 text-gray-500 dark:text-gray-400">カテゴリを登録してください。</p>
          <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
            <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors  duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>カテゴリを追加</span>
            </button>
          </div>
        @endforelse
      </div>
    </div>
  </section>
</x-app-layout>
