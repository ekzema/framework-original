$('#lang').change(function () {
  window.location = '/languages/change?lang=' + $(this).val();
})