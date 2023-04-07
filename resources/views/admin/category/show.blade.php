<x-admin-layout>
  <section class="container md:mx-2 mx-auto my-3 p-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg justify-center">
    <x-alert />
    <div class="sm:flex sm:items-center sm:justify-between">
      <div>
        <div class="flex items-center gap-x-3">
          <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-0">カテゴリ一覧</h2>
  
          <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">子カテゴリ : {{ count($category->childCategories) }}</span>
        </div>
  
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">親カテゴリ：{{ $category->name }} に登録されている子カテゴリ一覧です。</p>
      </div>
  
      <div class="flex items-center mt-4 gap-x-3">
        <a href="{{ route('admin.category.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white no-underline transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>カテゴリを追加</span>
        </a>
      </div>
    </div>
  
    <div class="flex items-center mt-6 text-center rounded-lg dark:border-gray-700">
      <div class="flex flex-col w-full  mx-auto">
        @forelse ($category->childCategories as $i => $child)
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
                    アイテム数
                  </th>
                  <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
          @endif
              <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="px-6 py-4">
                    {{ $child->id }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $child->name }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $category->countItems() }}
                  </td>
                  <td class="px-6 py-4 text-right">
                    <button type="button" data-modal-target="popup-modal{{ $i }}" data-modal-toggle="popup-modal{{ $i }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">削除</button>
                  </td>
                </tr>
          @if (count($category->childCategories) == $i + 1)
              </tbody>
            </table>
          </div>
          @endif
        @empty
          <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full dark:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
          </svg>
          </div>
          <h1 class="mt-3 text-lg text-gray-800 dark:text-white">子カテゴリが登録されていません</h1>
          <p class="mt-2 text-gray-500 dark:text-gray-400">子カテゴリを登録してください。</p>
          <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
            <a href="{{ route('admin.category.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white no-underlinetransition-colors   duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
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

  @foreach ($category->childCategories as $i => $child)
  
  <div id="popup-modal{{ $i }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{ $i }}">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close modal</span>
        </button>
        <div class="p-6 text-center">
          <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">カテゴリ名: {{ $category->name }}を削除してよろしいですか。</h3>
          <div class="p-6 text-center flex flex-col md:flex-row md:items-center md:justify-center gap-4">
            <button data-modal-hide="popup-modal{{ $i }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
              キャンセル
            </button>
            <form action="{{ route('admin.category.destroy', $child) }}" method="post">
              @csrf
              @method('delete')
              <button data-modal-hide="popup-modal{{ $i }}" type="submit" class="relatible text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                削除する
              </button>
            </form>
          </div>        </div>
      </div>
    </div>
  </div>
  @endforeach
  
</x-admin-layout>
