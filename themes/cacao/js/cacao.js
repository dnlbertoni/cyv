$(document).ready(function(){
  /**botones**/
  $('#Grabar').button({icons:{primary:'ui-icon-disk'}});
  $("#Volver").button({icons:{primary:'ui-icon-circle-arrow-w'}});
  
  /** validaciones**/
  $('.text-Form').keyup(function(){
    var valor= $(this).val().toUpperCase();
    $(this).val(valor);
  });
});

