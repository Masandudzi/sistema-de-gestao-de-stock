var ctrl = 1;
$('#add-fields').click(function () {
  $('#dynamic-fields').append('<div class="row" id="row'+ ctrl +'">'+
      '<div class="form-group col-lg-6">'+
        '<label for="nome">Nome do material</label>'+
        '<input type="text" class="form-control" name="nome[]" required="">'+
      '</div>'+
      '<div class="form-group col-lg-2">'+
        '<label for="qtd">Quantidade</label>'+
        '<input type="number" class="form-control" name="qtd[]" required="" min="1">'+
      '</div>'+
      '<div class="form-group col-lg-2">'+
        '<button style="margin-top:35px;"type="button" class="btn btn-danger btn-sm btn-remove" id="'+ ctrl +'">'+
          '<i class="fa fa-minus" aria-hidden="true"></i>'+
        '</button>'+
      '</div>'+
    '</div>');
});
$(document).on('click', '.btn-remove', function () {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
});
