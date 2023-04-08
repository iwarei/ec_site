$(document).ready(async function () {
  /* テキストエリアの行数を入力内容に合わせる */
  $('textarea.auto-resize').on('input', function () {
    this.style.height = 'auto';
    const height = this.scrollHeight + 4; // borderとpaddingの合計値を追加
    this.style.height = height + 'px';
  });

  $('input#price').on('input', function () {
    price = $(this).val();
    taxRate = $(this).data('tax-rate');

    $('span#taxed-price').text(Math.floor(price * (100 + taxRate) / 100));
  });

  // ページロード時にinputイベントを発生させ税込み価格と説明文に応じてtextareaの高さを調整
  $('input#price, textarea.auto-resize').trigger('input');


  $('select#parent-category').on('change', async function () {
    if ($(this).find(':selected').length) {
      let parentId = $(this).find((':selected')).val();
      let categories = await apiGetChildCategories(parentId);
      let childCategory = $('select#child-category');

      if (categories == undefined) {
        childCategory.empty()
          .append('<option value="0" selected>親カテゴリを選択してください');
        return;
      }
      $(childCategory).empty()
        .append('<option value="0" selected>選択してください');
      categories.forEach(category => {
        $(childCategory).append('<option value="' + category.id + '">' + category.name);
      });

      $(childCategory).find(':selected').val('選択してください。')
    }
    else {
      
    }
  });

  var apiGetChildCategories = async function (parentId) {
    return fetch('/admin/category/ajax?parent_id=' + parentId, {
      method: 'get',
    })
    .then(async (response) => {
      let data = await response.json();
      console.log(data);
      if (response.ok) {
        return data;
      }
      else {
          alert(data.message);
      }
    })
    .catch(err => {
      alert('ネットワーク接続を確認してください。')
    });
  }

  
  $('input#image').on('change', function() {
    const preview = $('#preview');

    // 選択されたファイルを取得
    let files = $(this)[0].files;


    for (let i = 0; i < files.length; i++) {
      const reader = new FileReader();
      reader.readAsDataURL(files[i]);
      reader.onload = function (event) {
        //要素を準備しておく
        let img = $('<div>').addClass('image-area w-1/3 flex-wrap');
        let imgWrapper = $('<div>').addClass('relative w-full p-1 md:p-2');
        let imgElement = $('<img>').addClass('block h-full w-full rounded-lg object-cover object-center').attr('src', event.target.result);
        let deleteButton = $('<button type="button">').addClass('image-delete relative block mt-1 mb-2 mx-auto bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded').text('削除');
        
        // 画像表示用要素に要素を追加
        img.append(imgWrapper);
        imgWrapper.append(imgElement, deleteButton);
        preview.append(img);
      };
    }
  });

  // 削除ボタン押下時
  $(document).on('click', 'button.image-delete',  function() {
    $(this).parents('div.image-area').remove();
  });

  Sortable.create(preview);

  // 送信ボタン押下時
  $('form').submit(function(event){
    let images = [];

    $('#preview img').each(function () {
      let image = $(this).prop('src')

      images.push(image);
    });

    //画像をJSONに変換
    let json = JSON.stringify(images);

    $('input[name="images"]').val(json);

    return true;

  });


});