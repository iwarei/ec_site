@extends ('user.layouts.app')

@section ('content')
  <div class="w-full my-2 px-4 mx-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
    <div class="text-start">
      {{ dd(Auth::user()->reviewer) }}
      @if (Auth::user()->reviewer())
        <a href="{{ route('reviewer.create') }}" target="_blank" class="flex mb-2 p-2 bg-cyan-100 rounded">
          <img src="{{ Auth::user()?->reviewer()?->iconSrc ?? asset('image/default_icon.jpg') }}" class="h-10 w-10 rounded-pill">
          <span class="p-2 mx-2">
            {{ Auth::user()?->reviewer()?->name ?? 'レビュー投稿の前に、プロフィール情報を登録してください。'  }}
          </span>
        </a>
      @endif

      <h4>この商品をレビュー</h4>
      <a href="{{ route('item.show', $item) }}" target="_blank" class="flex">
        <img src="{{ $item->topImage() }}" class="h-[4.5rem] w-[4.5rem]">
        <span class="p-2 mx-2">
          {{ $item->name }}
        </span>
      </a>
      <x-hr />
      <form method="post" action="{{ route('item.review.store', $item) }}">
        @csrf
        {{-- 総合評価 --}}
        <div>
          <h5>総合評価</h5>
          <x-select-rating name='rating' :item='$item'  />
          <x-validation-error name='rating' />
        </div>
        <x-hr />
        {{-- レビュータイトル --}}
        <div>
          <label class="w-full">
            <h5>レビュータイトル</h5>
            <div class="mb-2">
              <input type="text" name="title" placeholder="最も伝えたいポイントは何ですか？" value="{{ old('title', $item->authedUserReview()->title ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
          </label>
          <x-validation-error name='title' />
        </div>
        <x-hr />
        {{-- ToDo: 画像または動画を追加する --}}

        {{-- レビュー本文 --}}
        <div>
          <label class="w-full">
            <h5>レビューを追加</h5>
            <textarea rows="8" name="detail" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="気に入ったこと/気に入らなかったことは何ですか？この製品をどのように使いましたか？">{{ old('detail', $item?->authedUserReview()->detail ?? '') }}</textarea>
          </label>
          <x-validation-error name='detail' />
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
@endsection