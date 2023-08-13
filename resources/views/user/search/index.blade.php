@extends ('user.layouts.app')

@section ('content')
  <div class="container px-5 mx-auto mt-16">
    {{-- 検索結果: ヒットした商品あり --}}
    @if (count($items))
      <div>
        検索結果: {{ count($items) }}件の商品が見つかりました。
      </div>
      <div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
          {{-- 検索結果: アイテム表示 --}}
          @foreach($items as $item)
            <x-item :item="$item" />
          @endforeach
        </div>
      </div>
    @else
      {{-- 検索結果: ヒットした商品無 --}}
      <p>一致する商品が見つかりませんでした。</p>
    @endif
  </div>
  {{-- ページネーション --}}
  {{ $items->links() }}
@endsection


@section('script')

@endsection