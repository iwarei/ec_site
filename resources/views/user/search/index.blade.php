@extends ('user.layouts.app')

@section ('content')
  <div class="container px-5 mx-auto mt-16">
    {{-- 検索結果: ヒットした商品あり --}}
    @if (count($items))
      <div>
        検索結果: {{ count($items) }}件の商品が見つかりました。
      </div>
      <div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
          @foreach($items as $item)
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                <img src="{{ $item->topImage() }}">
              </a>
              <div class="px-5 pb-5">
                <a href="#">
                  <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                </a>
                {{-- レビュー評価 --}}
                <x-review-rating :review="$item->review()" />
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @else
      {{-- 検索結果: ヒットした商品無 --}}
      <p>一致する商品が見つかりませんでした。</p>
    @endif
  </div>
  {{ $items->links() }}


@endsection


@section('script')

@endsection