<h2 class="ui-widget-header">Clientes</h2>
<ul class="ui-widget-content">
  <li><?php echo anchor('clientes/add','Nuevo Cliente', "id='botAddCliente'")?><?php echo anchor('clientes/add','Nuevo Cliente')?></li>
  <li><?php echo anchor('clientes/listado','Lista de Clientes', 'id="botLisCliente"')?><?php echo anchor('clientes/listado','Lista de Clientes')?></li>
</ul>


<script>
$(document).ready(function(){
  $("#botAddCliente").button({icons:{primary:'ui-icon-circle-plus'}, text:false});
  $("#botLisCliente").button({icons:{primary:'ui-icon-document'}, text:false});
});
</script>