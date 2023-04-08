<div class="flex mt-6 text-left border py-4 rounded-lg dark:border-gray-700">
  <div class="flex flex-col w-full px-4 mx-auto">
    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">アイテム名</label>
      <input type="text" name="name" id="name" value="@isset($item){{ old('name', $item->name) }}@else{{ old('name') }}@endisset" class="bg-gray-50 @error('name') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="伊藤園 evian(エビアン) 硬水 ミネラルウォーター ペットボトル 330ml×24本 [正規輸入品]">
      @error('name')
        <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div class="row mt-4">
      <div class="mt-0 col-6 parent-category-area">
        <label for="parent-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">親カテゴリを選択してください</label>
        <select id="parent-category" class="bg-gray-50 @error('parent_id') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option @empty($item) selected @endempty value="0" disabled>選択してください</option>
          @foreach ($parent_categories as $category)
            @if(isset($item) && $item->category->parentCategory->id == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
        @error('parent_id')
          <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-0 col-6 child-category-area">
        <label for="child-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">所属するカテゴリを選択してください</label>
        <select id="child-category" name="category_id" class="disabled bg-gray-50 @error('category_id') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option @empty($item) selected @endempty value="0">親カテゴリを選択してください</option>
          @isset($item)
            <option selected value="{{ $item->category_id }}">{{ $item->category->name }}</option>
          @endisset
        </select>
        @error('category_id')
          <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="mt-4">
      <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">アイテム画像</label>
      <input type="hidden" name="images">
      <div class="container mx-auto py-2 lg:px-32 lg:pt-12">
        <div id="preview" class="-m-1 flex flex-wrap md:-m-2">
          {{-- 画像プレビューここに追加する --}}
          @isset($item)
            @foreach ($item->images as $image)
              <div class="image-area w-1/3 flex-wrap">
                <div class="relative w-full p-1 md:p-2">
                  <img class="block h-full w-full rounded-lg object-cover object-center" src="{{ $image->src }}">
                  <button type="button" class="image-delete relative block mt-1 mb-2 mx-auto bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">削除</button>
                </div>
              </div>
            @endforeach
          @endisset
        </div>
      </div>

      <div class="flex items-center mt-3 justify-center w-full">
        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">クリックして画像ファイルを選択してください。ドラッグ＆ドロップもできます。</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">[対応拡張子] PNG, JPG</p>
            </div>
            <input id="image" type="file" class="hidden" accept="image/png, image/jpeg" multiple />
        </label>
      </div> 

    </div>

    <div class="mt-4">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">アイテム説明</label>
      <textarea name="description" id="description" value="{{ old('description') }}" class="auto-resize bg-gray-50 @error('descript') border-red-400 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="4" placeholder="アイテムの説明文を入力してください。">@isset($item){{ old('description', $item->description) }}@else{{ old('description') }}@endisset</textarea>
      @error('description')
        <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div class="mt-4">
      <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">販売価格 (税抜)</label>
      <div class="flex">
        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
          ￥
        </span>
        <input type="number" name="price" id="price" data-tax-rate="{{ config('const.TAX_RATE') }}" value="@isset($item){{ old('price', $item->price) }}@else{{ old('price') }}@endisset" class="bg-gray-50 @error('price') border-red-400 @else border-gray-300 @enderror border-l-0 text-gray-900 text-sm rounded-none rounded-r-lg focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2480">
      </div>
      <p class="block mt-1 mb-2 text-sm text-gray-900 dark:text-white">税込み価格は<span id="taxed-price"></span>円です。</p>
      
      @error('price')
        <p class="mt-1 text-sm font-semibold text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div class="mt-4">
      <label class="relative inline-flex items-center mb-3 cursor-pointer">
        <input type="checkbox" name="publish_flag" value="1" class="sr-only peer" @if(isset($item) && $item->publish_flag) checked @endif>
        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">公開する</span>
      </label>
    </div>
  </div>
</div>
