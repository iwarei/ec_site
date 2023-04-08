<x-admin-layout>
  
  <section class="container my-3 mx-2 p-4 mx-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="sm:flex sm:items-center sm:justify-between">
      <div>
        <div class="flex items-center gap-x-3">
          <h2 class="text-lg font-medium text-gray-800 dark:text-white">カテゴリ新規登録</h2>
        </div>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">登録するカテゴリ情報を入力してください。</p>
      </div>
    </div>
    <form action="{{ route('admin.category.store') }}" method="post">
      @csrf
      <div class="flex mt-6 text-left border py-4 rounded-lg dark:border-gray-700">
        <div class="flex flex-col w-full px-4 mx-auto">
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">カテゴリ名</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 @error('name') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="本・コミック・雑誌">
            @error('name')
              <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
            @enderror
          </div>
          <div class="mt-4">
            <label class="relative inline-flex items-center mb-3 cursor-pointer">
              <input type="checkbox" name="child" value="on" class="sr-only peer">
              <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">子カテゴリとして登録する</span>
            </label>
          </div>
          <div class="mt-0 parent-select-area hidden">
            <label for="parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">所属する親カテゴリを選択してください</label>
            <select id="parent" name="parent_id" class="bg-gray-50 @error('parent_id') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected value="0">選択してください</option>
              @foreach ($parent_categories as $category) 
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            @error('parent_id')
              <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex justify-center items-center mt-4 gap-x-3">
        <button type="submit" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>登録する</span>
        </button>
      </div>
    </form>
  </section>

  
  <x-slot name="script">
    <script src="{{ asset('js/admin/category.js') }}"></script>
  </x-slot>
</x-admin-layout>
