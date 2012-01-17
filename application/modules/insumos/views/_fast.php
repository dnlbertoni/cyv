<h2 class="ui-widget-header">Insumos</h2>
<ul class="ui-widget-content">
  <li><?php echo anchor('insumos/add','Nuevo Insumo', "id='botAddInsumo'")?><?php echo anchor('insumos/add','Nuevo Insumo')?></li>
  <li><?php echo anchor('insumos/listado','Lista de insumos', 'id="botLisInsumo"')?><?php echo anchor('insumos/listado','Lista de insumos')?></li>
  <li><?php echo anchor('insumos/pdf/planilla','Planilla insumos', 'id="botPlanilla"')?><?php echo anchor('clientes/listadoinsumos/pdf/planilla','Planilla insumos')?></li>
</ul>


<script>
$(document).ready(function(){
  $("#botAddInsumo").button({icons:{primary:'ui-icon-circle-plus'}, text:false});
  $("#botLisInsumo").button({icons:{primary:'ui-icon-document'}, text:false});
  $("#botPlanilla").button({icons:{primary:'ui-icon-print'}, text:false});
});
</script>