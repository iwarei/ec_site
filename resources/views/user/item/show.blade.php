@extends ('user.layouts.app')

@section ('content')
  <div class="w-full mb-2 px-4 py-2 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
    <div class="grid grid-cols-2 gap-2">
      <div>
        @if (count($item->images) > 1)
          <div id="indicators-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
              @foreach ($item->images as $i => $image)
                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ !$i ? 'active' : '' }}">
                  <img src="{{ $image->src }}" class="absolute block w-full h-full object-contain -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
              @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
              @foreach($item->images as $i => $image)
                <button type="button" class="w-3 h-3 rounded-full bg-slate-400 border" aria-current="{{ !$i ? true : false }}" aria-label="Slide {{ $i }}" data-carousel-slide-to="{{ $i }}"></button>
              @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
              <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-slate-400 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
              </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
              <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-slate-400 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
              </span>
            </button>
          </div>
          <div class="flex justify-center mt-5">
            @foreach ($item->images as $i => $image)
              {{-- 画像フォーカス時、押下された画像を表示するようにする --}}
              <div class="w-16 h-16 mx-2 p-1 border rounded">
                <img src="{{ $image->src }}" class=" w-full h-full object-contain" alt="...">
              </div>
            @endforeach
          </div>
        @else
          <div class="p-8">
            <img src="{{ $item->topImage() }}" class="block w-full h-full object-contain" alt="...">
          </div>
        @endif
      </div>
      <div>
        <h4 class="text-start mt-6">
          {{ $item->name }}
        </h4>
        <x-review-rating :item="$item" itemPage/>
        <x-hr />
        <div>
          <span>
            価格:&nbsp
          </span>
          <span>
            {{ number_format($item->taxedPrice) }}
          </span>
          <span>
            税込
          </span>
        </div>
        <hr class="h-px my-3 pl-3 bg-gray-500 border-0">
        <div class="flex justify-center">
          <span class="mx-2">
            <div>
              <button data-popover-target="popover-shipping" data-popover-placement="bottom" type="button" class="rounded-full text-white mb-1 bg-slate-100 hover:bg-slate-200 font-medium text-sm p-3 text-center">
                <svg class="w-6 h-6 text-gray-800 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.5 10.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm0 0a2.225 2.225 0 0 0-1.666.75H12m3.5-.75a2.225 2.225 0 0 1 1.666.75H19V7m-7 4V3h5l2 4m-7 4H6.166a2.225 2.225 0 0 0-1.666-.75M12 11V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v9h1.834a2.225 2.225 0 0 1 1.666-.75M19 7h-6m-8.5 3.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z"/>
                </svg>
              </button>
            </div>
            <div>
              Amazingによる発送
            </div>
            <div data-popover id="popover-shipping" role="tooltip" class="absolute z-40 invisible inline-block w-96 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
              <div class="p-3 space-y-2 text-start">
                <h6 class="font-semibold text-gray-900">Amazingによる発送</h6>
                <p>
                  Amazing.co.jpが発送する商品の通常配送では、条件を満たした場合、日本国内へは無料で商品をお届けします。
                </p>
                <p>
                  初めてお買い物をされるお客様については、ご注文金額に関わらず通常配送が無料になります。詳しくは、配送料についてをご覧ください。 
                </p>
                <p>
                  Amazingプライム会員およびPrime Student会員の方は、配送オプションに関わらず配送料無料です。
                </p>
                <p>
                  商品の配送状況は注文履歴からも追跡できます。
                </p>
              </div>
              <div data-popper-arrow></div>
            </div>
          </span>

          <span class="mx-2">
            <button data-popover-target="popover-safety" data-popover-placement="bottom" type="button" class="rounded-full text-white mb-1 bg-slate-100 hover:bg-slate-200 font-medium text-sm p-3 text-center">
              <svg class="w-6 h-6 text-gray-800 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/>
              </svg>
            </button>
            <div>
              安心・安全への取り組み
            </div>
            <div data-popover id="popover-safety" role="tooltip" class="absolute z-40 invisible inline-block w-96 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
              <div class="p-3 space-y-2 text-start">
                <h6 class="font-semibold text-gray-900">安心・安全への取り組み</h6>
                <p>
                  Amazingは安心・安全のために取り組んでいます。ストレスや不安なくお買い物いただくため、商品の返品対応やカスタマーサポート、信頼性のあるカスタマレビューのための健全なコミュニティの運営、お客様のプライバシーの保護などに取り組んでいます。また配送、梱包、製品、物流拠点などさまざまな面で、サステナブルな未来への取り組みを進めています。
                </p>
              </div>
              <div data-popper-arrow></div>
            </div>
          </span>

          <span class="mx-2">
            <button data-popover-target="popover-personal-info" data-popover-placement="bottom" type="button" class="rounded-full text-white mb-1 bg-slate-100 hover:bg-slate-200 font-medium text-sm p-3 text-center">
              <svg class="w-6 h-6 text-gray-800 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9V4a3 3 0 0 0-6 0v5m9.92 10H2.08a1 1 0 0 1-1-1.077L2 6h14l.917 11.923A1 1 0 0 1 15.92 19Z"/>
              </svg>
            </button>
            <div>
              お客様情報の保護
            </div>
            <div data-popover id="popover-personal-info" role="tooltip" class="absolute z-40 invisible inline-block w-96 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
              <div class="p-3 space-y-2 text-start">
                <h6 class="font-semibold text-gray-900">お客様情報を保護しています</h6>
                <p>
                  Amazingはお客様のセキュリティとプライバシーの保護に全力で取り組んでいます。Amazingの支払いセキュリティシステムは、送信中にお客様の情報を暗号化します。お客様のクレジットカード情報を出品者と共有することはありません。また、お客様の情報を他者に販売することはありません。
                </p>
              </div>
              <div data-popper-arrow></div>
            </div>
          </span>

          <span class="mx-2">
            <button data-popover-target="popover-personal-support" data-popover-placement="bottom" type="button" class="rounded-full text-white mb-1 bg-slate-100 hover:bg-slate-200 font-medium text-sm p-3 text-center">
              <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13v-3a9 9 0 1 0-18 0v3m2-3h3v7H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2Zm11 0h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3v-7Z"/>
              </svg>
            </button>
            <div>
              アフターサポート
            </div>
            <div data-popover id="popover-personal-support" role="tooltip" class="absolute z-40 invisible inline-block w-96 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
              <div class="p-3 space-y-2 text-start">
                <h6 class="font-semibold text-gray-900">Amazingによるアフターサポート</h6>
                <p>
                  配送状況の確認、初期不良商品に伴う返品・返金のご案内等、ご注文後のお困りごとはAmazingがサポートします。
                </p>
              </div>
              <div data-popper-arrow></div>
            </div>
          </span>

        </div>
      </div>
    </div>
    <x-hr />
    {{-- 商品説明 --}}
    <div class="text-start">
      {!! nl2br($item->description) !!}
    </div>
    <x-hr />
    {{-- レビュー --}}
    <div class="grid grid-cols-3 md:gap-3">
      {{-- カスタマーレビュー表示（左） --}}
      <div class="col-span-3 md:col-span-1">
        <h5 class="text-start">
          カスタマーレビュー
        </h5>
        <x-review-rating :item="$item" reviewArea />

        <div id="accordion-flush" data-accordion="collapse" class="mb-3 pb-3" data-active-classes="pb-3 bg-white text-gray-900" data-inactive-classes="pb-3 text-gray-500">
          <h6 id="accordion-flush-heading-1 pb-3">
            <button type="button" class="flex items-center w-full font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
              <svg data-accordion-icon class="w-3 h-4 mx-2 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
              </svg>
              <span>評価はどのように計算されますか?</span>
            </button>
          </h6>
          <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
            <div class="pt-1 pb-2 text-start border-b border-gray-200">
              <p class="mb-2 pl-6 text-gray-500">
                全体的な星の評価と星ごとの割合の内訳を計算するために、単純な平均は使用されません。その代わり、レビューの日時がどれだけ新しいかや、レビューアーがAmazingで商品を購入したかどうかなどが考慮されます。また、レビューを分析して信頼性が検証されます。
              </p>
            </div>
          </div>
        </div>
        
        <h6 class="text-start">
          この商品をレビュー
        </h6>
        <p class="text-start">
          他のお客様にも意見を伝えましょう。
        </p>
        <div class="flex">
          <a href="{{ route('item.review.create', $item) }}" target="_blank" class="w-full text-gray-900 bg-white border border-gray-500 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
            カスタマーレビューを書く
          </a>
        </div>
        <x-hr />
      </div>
      <div class="col-span-3 md:col-span-2">
        {{-- カスタマーレビュー表示（右） --}}
        {{-- ToDo: 画像付きのレビューのみ表示 (画像レビューがある場合のみ) --}}
        <div class="flex flex-col items-start text-start">
          <h5>
            画像付きのレビュー
          </h5>
          <a href="#">画像付きのレビューをすべて表示</a>
          <h5 class="mb-4">上位レビュー、対象国: 日本</h5>
          
          {{-- ToDo: トップレビューを表示 --}}
          {{-- ToDo: レビュー表示部品化 --}}
          @foreach ($item->topReviews() as $review)
            <article>
              <div class="flex items-start mb-1 space-x-4">
                {{ dd(Auth::user()->reviewer()) }}
                {{-- {{ dd($review->user) }} --}}
                <img  class="w-10 h-10 rounded-full" src="{{ Auth::user()?->reviewer()?->iconSrc ?? asset('image/default_icon.jpg') }}" alt="">
                <div class="space-y-1 font-medium">
                  <p class="mb-1">{{ Auth::user()?->reviewer()?->name ?? 'ななしさん' }}
                    <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500">レビューワー登録日: </time>
                  </p>
                </div>
              </div>
              <div class="flex items-start mb-1">
                <span>
                  <x-review-rating :item="$item" />
                </span>
                <h3 class="ml-2 text-sm font-semibold text-gray-900">Thinking to buy another one!</h3>
              </div>
              <footer class="mb-2 text-sm text-gray-500"><p class="mb-0">Reviewed in the United Kingdom on <time datetime="2017-03-03 19:00">March 3, 2017</time></p></footer>
              <p class="mb-2 text-gray-500">This is my third Invicta Pro Diver. They are just fantastic value for money. This one arrived yesterday and the first thing I did was set the time, popped on an identical strap from another Invicta and went in the shower with it to test the waterproofing.... No problems.</p>
              <p class="mb-3 text-gray-500">It is obviously not the same build quality as those very expensive watches. But that is like comparing a Citroën to a Ferrari. This watch was well under £100! An absolute bargain.</p>
              <a href="#" class="block mb-5 text-sm font-medium text-blue-600 hover:underline">Read more</a>
              <aside>
                <p class="mt-1 text-xs text-gray-500">19 people found this helpful</p>
                <div class="flex items-start mt-3 space-x-3 divide-x divide-gray-200">
                  <a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5">Helpful</a>
                  <a href="#" class="pl-4 text-sm font-medium text-blue-600 hover:underline">Report abuse</a>
                </div>
              </aside>
            </article>
          @endforeach

          @forelse ($item->newReviews() as $review)

          @empty
            <p>まだカスタマーレビューはありません。</p>
          @endforelse
        </div>
      </div>

    </div>
    <x-hr />
    
  </div>
@endsection


@section('script')

@endsection