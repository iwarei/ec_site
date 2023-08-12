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
                <div class="flex items-center mt-2.5 mb-5">
                  @php
                    $review = $item->review();
                  @endphp
                  @for ($i = 0; $i < 5; $i++)
                    @if ($review >= 1.0)
                      <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                      </svg>
                    @elseif($review <= 1.0 && $review > 0.0)
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20">
                        <defs>
                          <linearGradient id="halfYellowHalfGray" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="{{ $review * 100 }}%" style="stop-color: #faca15; stop-opacity: 1" />
                            <stop offset="{{ $review * 100 }}%" style="stop-color: #d5d7db; stop-opacity: 1" />
                          </linearGradient>
                        </defs>
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" fill="url(#halfYellowHalfGray)" />
                      </svg>
                    @else
                      <svg class="w-4 h-4 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                      </svg>
                    @endif
                    @php
                      $review -= 1.0
                    @endphp
                  @endfor
                </div>
                <div class="flex items-center justify-between">
                  <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                  <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">カートに入れる</a>
                </div>
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