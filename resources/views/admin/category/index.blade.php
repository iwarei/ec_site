<x-admin-layout>
  <section class="container md:mx-2 mx-auto my-3 p-4 bg-white shadow sm:rounded-lg justify-center">
    <x-alert />
    <div class="sm:flex sm:items-center sm:justify-between">
      <div>
        <div class="flex items-center gap-x-3">
          <h2 class="text-lg font-medium text-gray-800 mb-0">カテゴリ一覧</h2>
  
          <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">親カテゴリ : {{ count($categories) }}</span>
        </div>
  
        <p class="mt-1 text-sm text-gray-500">登録されているカテゴリ一覧（親カテゴリ）です。</p>
      </div>
  
      <div class="flex items-center mt-4 gap-x-3">
        <a href="{{ route('admin.category.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white no-underline transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>カテゴリを追加</span>
        </a>
      </div>
    </div>
  
    <div class="flex items-center mt-6 text-center rounded-lg">
      <div class="flex flex-col w-full  mx-auto">
        @forelse ($categories as $i => $category)
          @if ($i == 0)
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rounded text-gray-500">
              <thead class="text-sm text-gray-700 uppercase rounded bg-gray-50">
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
                <tr class="bg-white border-b hover:bg-gray-50">
                  <td class="px-6 py-4">
                    {{ $category->id }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $category->name }}
                  </td>
                  <td class="px-6 py-4">
                    {{ count($category->childCategories) }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $category->countItems() }}
                  </td>
                  <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.category.show', $category) }}" class="font-medium text-blue-600 hover:underline">詳細</a>
                  </td>
                </tr>
          @if (count($categories) == $i + 1)
              </tbody>
            </table>
          </div>
          @endif
        @empty
          <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
          </svg>
          </div>
          <h1 class="mt-3 text-lg text-gray-800">カテゴリが登録されていません</h1>
          <p class="mt-2 text-gray-500">カテゴリを登録してください。</p>
          <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
            <a href="{{ route('admin.category.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white no-underline transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>カテゴリを追加</span>
            </a>
          </div>
        @endforelse
      </div>
    </div>
  </section>
</x-admin-layout>
