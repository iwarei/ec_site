$(document).ready(function () {
  $('input[name="child"]').on('change', function () {
    if ($(this).prop('checked')) {
      $('div.parent-select-area').removeClass('hidden');
    }
    else {
      $('option:selected').prop('selected', false);
      $('div.parent-select-area').addClass('hidden');
    }
  });
});