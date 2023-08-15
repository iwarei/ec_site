@extends ('user.layouts.app')

@section ('content')
  <div class="w-full mb-2 px-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
    <div class="text-start">
      <h4>この商品をレビュー</h4>
      <div class="flex">
        <img src="{{ $item->topImage() }}" class="h-[4.5rem] w-[4.5rem]">
        <span class="p-2 mx-2">
          {{ $item->name }}
        </span>
      </div>
      <x-hr />
      <form method="post" action="{{ route('item.review.store', $item) }}">
        @csrf
        {{-- 総合評価 --}}
        <div>
          <h5>総合評価</h5>
          {{-- ToDo: 評価選択 部品化する --}}
          <div class="flex">
            <label class="flex items-center p-1">
              <input id="rating-radio1" name="rating" type="radio" value="1" class="absolute w-8 h-8 opacity-0 border-none">
              <svg class="w-8 h-8 text-gray-200" name="rating-star" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
            </label>

            <label class="flex items-center p-1">
              <input id="rating-radio2" name="rating" type="radio" value="2" class="absolute w-8 h-8 opacity-0 border-none">
              <svg class="w-8 h-8 text-gray-200" name="rating-star" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
            </label>

            <label class="flex items-center p-1">
              <input id="rating-radio3" name="rating" type="radio" value="3" class="absolute w-8 h-8 opacity-0 border-none">
              <svg class="w-8 h-8 text-gray-200" name="rating-star" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
            </label>

            <label class="flex items-center p-1">
              <input id="rating-radio4" name="rating" type="radio" value="4" class="absolute w-8 h-8 opacity-0 border-none">
              <svg class="w-8 h-8 text-gray-200" name="rating-star" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
            </label>

            <label class="flex items-center p-1">
              <input id="rating-radio5" name="rating" type="radio" value="5" class="absolute w-8 h-8 opacity-0 border-none">
              <svg class="w-8 h-8 text-gray-200" name="rating-star" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
            </label>
          </div>
        </div>
        <x-hr />
        {{-- レビュータイトル --}}
        <div>
          <label class="w-full">
            <h5>レビュータイトル</h5>
            <div class="mb-2">
            <input type="text" name="title" placeholder="最も伝えたいポイントは何ですか？" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          </div>
        </label>
        </div>
        <x-hr />
        {{-- ToDo: 画像または動画を追加する --}}

        {{-- レビュー本文 --}}
        <div>
          <label class="w-full">
            <h5>レビューを追加</h5>
            <textarea rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="気に入ったこと/気に入らなかったことは何ですか？この製品をどのように使いましたか？"></textarea>
          </label>
        </div>
        <x-hr />
        <div class="pe-2 text-end">
          <button type="submit" class="text-gray-900 bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 mr-2 mb-2">
            投稿
          </button>
        </div>

      </form>        
    </div>
  </div>
@endsection


@section('script')
  {{-- 総合評価の選択用JS --}}
  <script>
    const radios = document.getElementsByName('rating');
    const stars = document.getElementsByName('rating-star')

    // 選択された評価値を取得
    for (let i = 0; i < radios.length; i++) {
      radios[i].addEventListener('change', function() {
        let selectValue = this.value;
        changeStarColor(selectValue);
      });
    }

    // 選択値に応じて星の色を変える
    const changeStarColor = (selected) => {
      for (let i = 0; i < stars.length; i++) {
        if (i < selected) { 
          stars[i].classList.remove('text-gray-200');
          stars[i].classList.add('text-yellow-300');
        }
        else {
          stars[i].classList.remove('text-yellow-300');
          stars[i].classList.add('text-gray-200');
        }
      }
    };
  </script>
@endsection