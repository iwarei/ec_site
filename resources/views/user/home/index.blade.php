@extends ('user.layouts.app')

@section ('content')
  <div class="px-2 pt-2">
    {{-- お知らせ/キャンペーンエリア --}}
    <div class="w-full mb-2 px-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
      <img class="mx-auto" src="{{ asset('image/line_summer3.png') }}">
      <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Amazing.co.jp サマーキャンペーン実施中 (9/30まで)</h5>
      <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">カート内の商品が10%引きになるクーポンをプレゼント！<br>クーポンコード: 2XFIPS</p>
      <img class="mx-auto" src="{{ asset('image/line_summer2.png') }}">
    </div>

    {{-- 人気の商品 --}}
    <div class="w-full mb-2 px-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
      <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">人気の商品</h5>
      <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">売上上位の人気商品を、あなたも購入しませんか。</p>
      {{-- ToDo: 人気商品を表示 --}}
    </div>


    {{-- オススメの商品 (ランダムに表示する) --}}
    <div class="w-full mb-2 px-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
      <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">おすすめの商品</h5>
      <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">購入者の評価が高い、おすすめの商品です。</p>
      {{-- ToDo: オススメの商品を表示 --}}
    </div>

    {{-- 注文履歴 (ログインユーザのみ) --}}
    @auth
      {{-- ToDo: 注文履歴がある場合のみ表示する --}}
      {{-- @if (count(historys)) --}}
      <div class="w-full mb-2 px-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">過去に注文した商品</h5>
        <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">もう一度購入する必要はありませんか。</p>
        {{-- ToDo: オススメの商品を表示 --}}
      </div>
      {{-- @endif --}}
    @endauth




  </div>
@endsection


@section('script')

@endsection