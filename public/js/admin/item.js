$(document).ready(async function () {
  $('select#parent-category').on('change', async function () {
    if ($(this).find(':selected').length) {
      let parentId = $(this).find((':selected')).val();
      await apiGetChildCategories(parentId);
    }
    else {
      
    }
  });

  var apiGetChildCategories = async function (parentId) {
    await fetch('/admin/category/ajax?parent_id=' + parentId, {
      method: 'get',
    })
    .then(async (response) => {
      let data = await response.json();
      if (response.ok) {
        if (data.status === '0') {
          console.log(response);
        }
        else {
            alert(data.message);
        }
      }
      else {
          alert(data.message);
      }
      $('#login-button').prop('disabled', false);
    })
    .catch(err => {
      alert('カテゴリ情報取得中にエラーが発生しました。')
    });
  }
});