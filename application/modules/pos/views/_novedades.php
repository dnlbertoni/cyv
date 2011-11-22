<h2 class="ui-widget-header">Sucursales</h2>
<ul class="ui-widget-content">
  <li><?php echo anchor('pos/sucursales/add','Nueva Sucursal', "id='botAddSucursal'")?><?php echo anchor('pos/sucursales/add','Nueva Sucursal')?></li>
  <li><?php echo anchor('pos/sucursales','Modificar Sucursal', "id='botModSucursal'")?><?php echo anchor('pos/sucursales','Modificar Sucursal')?></li>
  <li><?php echo anchor('pos/sucursales','Lista de Sucursales', 'id="botLisSucursal"')?><?php echo anchor('pos/sucursales','Lista de Sucursales')?></li>
</ul>


<script>
$(document).ready(function(){
  $("#botAddSucursal").button({icons:{primary:'ui-icon-circle-plus'}, text:false});
  $("#botModSucursal").button({icons:{primary:'ui-icon-pencil'}, text:false});
  $("#botLisSucursal").button({icons:{primary:'ui-icon-document'}, text:false});
});
</script>