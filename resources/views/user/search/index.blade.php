@extends ('user.layouts.app')

@section ('content')
  <div class="container px-5 mx-auto mt-16">
    @forelse($items as $item)
      {{-- 検索結果: ヒットした商品あり --}}
      @if ($loop->first)
        <div>
          検索結果: {{ count($items) }}件の商品が見つかりました。
        </div>
      @endif 
      <a href="{{ route('item.show', $item) }}">
        <div class="row rounded border bg-white mb-2">
          <div class="col-3 border-e">
            <img  src="{{ optional($item->topImage())->src ?? asset('image/noimage.jpg') }}">
          </div>

          <div class="col-6 py-2 px-3">
            {{ $item->name }} {{ $item->taxedPrice }}
          </div>
          
          <div class="col-3 py-2 px-3">
            税込 {{ $item->taxedPrice }}円
          </div>

        </div>
      </a>
      {{-- @if ($loop->last) --}}
        {{ $items->links() }}
      {{-- @endif --}}
    @empty
      {{-- 検索結果: ヒットした商品無 --}}
      <p>一致する商品が見つかりませんでした。</p>
    @endforelse
  </div>

@endsection


@section('script')

@endsection