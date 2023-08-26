@props(['name', 'item'])

@php
  $radioName = "'".$name."'";
  $starName = "'".$name."-star'";
  $selecterVal = "'input[name=\"".$name."\"]:checked'";
@endphp

<div class="flex">
  @for ($i = 1; $i <= 5; $i++)
    <label class="flex items-center p-1">
      <input name="{{ $name }}" type="radio" value="{{ $i }}" class="absolute w-8 h-8 opacity-0 border-none" {{ old($name) ? (old($name) == $i ? 'checked' : '') : ($item->authedUserReview()-> $name == $i ? 'checked' : '' )}}>
      <svg class="w-8 h-8 text-gray-200" name="rating-star" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
      </svg>
    </label>
  @endfor
</div>


{{-- 総合評価の選択用JS --}}
<script>
  const radios = document.getElementsByName({!! $radioName !!});
  const stars = document.getElementsByName({!! $starName !!});

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
  
  // 初期表示用 (バリデーションに引っかかった際)
  const selectedElement = document.querySelector({!! $selecterVal !!});
  const initialValue = selectedElement ? selectedElement.value : '';
  if (initialValue) {
    changeStarColor(initialValue);
  }
</script>