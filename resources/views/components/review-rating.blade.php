@props(['item', 'showModal' => false, 'modalName' => 'modal', 'showRate' => false, 'itemPage' => false, 'reviewArea' => false])

@php
  $tempReview = $item->review();
@endphp

<div class="flex items-center">
  {{-- スター表示 --}}
  @for ($i = 0; $i < 5; $i++)
    @if ($tempReview >= 1.0)
      <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
      </svg>
    @elseif($tempReview <= 1.0 && $tempReview > 0.0)
      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20">
        <defs>
          <linearGradient id="halfYellowHalfGray" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="{{ $tempReview * 100 }}%" style="stop-color: #faca15; stop-opacity: 1" />
            <stop offset="{{ $tempReview * 100 }}%" style="stop-color: #d5d7db; stop-opacity: 1" />
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
      $tempReview -= 1.0
    @endphp
  @endfor
  
  {{-- 評価レーティング表示 --}}
  @if ($showRate || $itemPage || $reviewArea)
    <span class="ml-2">
      <span class="text-sm">
        @if ($reviewArea)
          {{ $item->review() }}&nbsp/&nbsp5.0
        @else
          ({{ $item->review() }})
        @endif
      </span>
    </span>
  @endif

  {{-- 評価詳細表示モーダルボタン --}}
  @if ($showModal || $itemPage)
    <span class="ml-2">
      <button data-modal-target="{{ $modalName }}" data-modal-toggle="{{ $modalName }}" class="text-sm py-2" type="button">
        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
      </button>
    </span>
    <div id="{{ $modalName }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
          <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="{{ $modalName }}">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="px-4 py-4 lg:px-6">
            @php
              $tempReview = $item->review()
            @endphp
            <div class="flex items-center mt-2.5 mb-3">
              {{-- スター表示 --}}
              @for ($i = 0; $i < 5; $i++)
                @if ($tempReview >= 1.0)
                  <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                  </svg>
                @elseif($tempReview <= 1.0 && $tempReview > 0.0)
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20">
                    <defs>
                      <linearGradient id="halfYellowHalfGray" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="{{ $tempReview * 100 }}%" style="stop-color: #faca15; stop-opacity: 1" />
                        <stop offset="{{ $tempReview * 100 }}%" style="stop-color: #d5d7db; stop-opacity: 1" />
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
                  $tempReview -= 1.0
                @endphp
              @endfor
              <span class="ml-2">
                <span class="text-sm">
                  ({{ $item->review() }})
                </span>
              </span>          
            </div>
            <div class="mb-3">
              {{-- ToDo: 評価数を実際の評価数にする --}}
              {{ number_format(1000) }}件のグローバル評価
            </div>
            <div class="mb-3">
              <table class="w-full">
                <tbody>
                  @for ($i = 0; $i < 5; $i++)
                    <tr class="h-8">
                      <td class="w-1/5 lg:w-1/6 text-center">
                        <span>
                          星{{ $i + 1 }}つ
                        </span>
                      </td>
                      <td class="w-3/5 lg:w-4/6">
                        <span>
                          <div class="h-6 w-full bg-gray-200 rounded-full">
                            <div class="h-6 bg-yellow-300 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full py-1.5" style="width: 20%"></div>
                          </div>                
                        </span>
                      </td>
                      
                      <td class="w-1/5 lg:w-1/6 text-center">
                        <span>
                          {{-- ToDo: 評価比率を実数値にする --}}
                          20%
                        </span>
                      </td>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
            <x-hr /> 
            <div class="flex justify-center">
              <a href="{{ route('item.show', $item).'#review' }}">カスタマーレビューを見る ></a>
            </div>
          </div>
        </div>
      </div>
    </div> 
  @endif

  @if ($itemPage)
  <div class="pl-2">
    {{-- ToDo: 実際の評価数にする --}}
    <span>
      {{ number_format(1000) }}件の評価&nbsp
    </span>
    {{-- ToDo: 質問機能実装と実表示化 --}}
    @if (true)
      <span>
        | {{ number_format(1000) }}件の質問に回答済
      </span>
    @endif
  </div>
  @endif
</div>

{{-- 評価表示 --}}
@if ($reviewArea)
  <div class="mb-3">
    {{-- ToDo: 評価数を実際の評価数にする --}}
    {{ number_format(1000) }}件のグローバル評価
  </div>
  <div class="mb-4">
    <table class="w-full mb-3">
      <tbody>
        @for ($i = 0; $i < 5; $i++)
          <tr class="h-8">
            <td class="w-1/5 lg:w-1/6 text-center">
              <span>
                星{{ $i + 1 }}つ
              </span>
            </td>
            <td class="w-3/5 lg:w-4/6">
              <span>
                <div class="h-6 w-full bg-gray-200 rounded-full">
                  <div class="h-6 bg-yellow-300 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full py-1.5" style="width: 20%"></div>
                </div>                
              </span>
            </td>

            <td class="w-1/5 lg:w-1/6 text-center">
              <span>
                {{-- ToDo: 評価比率を実数値にする --}}
                20%
              </span>
            </td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
@endif
