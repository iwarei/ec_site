@props(['item', 'showSimple' => false])

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
  <a href="{{ route('item.show', $item) }}">
    <img src="{{ $item->topImage() }}" class="block w-full object-scale-down" style="aspect-ratio: 1/1">
    <div class="px-3 pb-4">
      <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
      @if (!$showSimple)
        {{-- レビュー評価 --}}
        <x-review-rating :item="$item" showModal="true" showRate="true" />
        {{-- 金額表示 --}}
        <div class="flex items-end">
          {{-- 税込表示 --}}
          <p class="pr-4">
            <span class="text-sm">￥</span><span class="text-3xl">{{ number_format($item->taxedPrice) }}<span> 
          </p>
          {{-- 参考価格 --}}
          <p class="pb-1">
            <span class="text-base">参考: </span>
            {{-- ToDo: 定価カラムの追加 --}}
            <span class="text-sm">3000円</span>
          </p>
        </div>
        {{-- カートに入れるボタン --}}
        <div class="flex items-center justify-between mt-2">
          <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600     dark:hover:bg-bluedark:focus:ring-blue-800">カートに入れる</button>
        </div>
      @endif
    </div>
  </a>
</div>
