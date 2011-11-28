<h2 class="ui-widget-header">Funciones</h2>
<ul class="ui-widget-content">
  <li><div id="Cancel">F1  - Cancela</div></li>
  <li><div id="Recupero">F3  - Reactivo Comprobante</div></li>
  <li><div id="ChangeSuc">F6  - Cambio Sucursal</div></li>
  <li><div id="PrintFac">F12 - Imprime Comprobante</div></li>
</ul>
<script>
$(document).ready(function(){
  $('li > div').css('padding-left', '30px');
  $("#Cancel").button({icons:{primary:'ui-icon-circle-close'}});
  $("#Recupero").button({icons:{primary:'ui-icon-document'}});
  $("#ChangeSuc").button({icons:{primary:'ui-icon-transfer-e-w'}});
  $("#PrintFac").button({icons:{primary:'ui-icon-print'}});
});
</script>