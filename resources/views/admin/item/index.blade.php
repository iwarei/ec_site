<x-admin-layout>
  <section class="container md:mx-2 mx-auto my-3 p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="sm:flex sm:items-center sm:justify-between">
      <div>
        <div class="flex items-center gap-x-3">
          <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-0">アイテム一覧</h2>
  
          <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ count($items) }} items</span>
        </div>
  
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">登録されているアイテム（商品群）の一覧です。</p>
      </div>
  
      <div class="flex items-center mt-4 gap-x-3">
        <a href="{{ route('admin.item.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white no-underline transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>アイテムを追加</span>
        </a>
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
  
    <div class="flex items-center mt-6 text-center rounded-lg @if(!count($items)) border p-4 @endif">
      <div class="flex flex-col w-full  mx-auto">
        @forelse ($items as $i => $item)
          @if ($i == 0)
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rounded text-gray-500 dark:text-gray-400">
              <thead class="text-sm text-gray-700 uppercase rounded bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    カテゴリ名
                  </th>
                  <th scope="col" class="px-6 py-3">
                    子カテゴリ数
                  </th>
                  <th scope="col" class="px-6 py-3">
                    アイテム数
                  </th>
                  <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody>
          @endif
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="px-6 py-4">
                    {{ $item->id }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $item->name }}
                  </td>
                  <td class="px-6 py-4">
                    {{-- {{ count($item->childCategories) }} --}}
                  </td>
                  <td class="px-6 py-4">
                    {{-- {{ $item->countItems() }} --}}
                  </td>
                  <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.item.show', $item) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">詳細</a>
                  </td>
                </tr>
          @if (count($item) == $i + 1)
              </tbody>
            </table>
          @endif
        @empty
          <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full dark:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
          </svg>
          </div>
          <h1 class="mt-3 text-lg text-gray-800 dark:text-white">アイテムが登録されていません</h1>
          <p class="mt-2 text-gray-500 dark:text-gray-400">アイテムを登録してください。</p>
          <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
            <a href="{{ route('admin.item.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white no-underline transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>アイテムを追加</span>
            </a>
          </div>
        @endforelse
      </div>
    </div>
  </section>
</x-admin-layout>
