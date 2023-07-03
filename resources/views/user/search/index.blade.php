@extends ('user.layouts.app')

@section ('content')
  <div class="container px-5 mx-auto mt-16">
    @forelse($items as $item)
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

    @empty
      <p>一致する商品が見つかりませんでした。</p>
    @endforelse
  </div>

@endsection


@section('script')

@endsection