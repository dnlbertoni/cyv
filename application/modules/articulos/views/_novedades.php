<h2 class="ui-widget-header">Articulos</h2>
<ul class="ui-widget-content">
  <li><?php echo anchor('articulos/nuevo','Nuevo Articulo', "id='botAddArticulo'")?><?php echo anchor('articulos/nuevo','Nuevo Articulo')?></li>
  <li><?php echo anchor('articulos/listaPrecios','Lista Precios', "id='botLista'")?><?php echo anchor('articulos/listaPrecios','Lista de Precios')?></li>
</ul>


<script>
$(document).ready(function(){
  $("#botAddArticulo").button({icons:{primary:'ui-icon-circle-plus'}, text:false});
  $("#botLista").button({icons:{primary:'ui-icon-document'}, text:false});
});
</script>