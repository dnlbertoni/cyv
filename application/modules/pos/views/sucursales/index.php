<h2 class="title">
  <a href="#">Sucursales</a>
</h2>
<p class="meta">
  <span class="date">Listado de Sucursales</span>
  <span class="posted"> 
    <?php echo anchor('pos/sucursales/add','Nueva Sucursal','id="botNuevaSucursal"');?>
  </span>
</p>
<div style="clear: both;">&nbsp;</div>
<div class="entry">
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Acciones</th>
    </tr>
  </thead>
<?php foreach($sucursales as $suc):?>
<tr>
  <td><?php echo $suc->id?></td>
  <td><?php echo $suc->nombre?></td>
  <td><?php echo $suc->direccion?></td>
  <td>
    <?php echo anchor('pos/sucursales/edit/'.$suc->id,'Editar', 'class="botEditar"')?>
    <?php echo anchor('pos/sucursales/borrar/'.$suc->id,'Borrar', 'class="botBorrar"')?>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>

<script>
$(document).ready(function(){
  $(".botEditar").button({icons:{primary:'ui-icon-pencil'}, text:false});
  $(".botBorrar").button({icons:{primary:'ui-icon-trash'}, text:false});
  $("#botNuevaSucursal").button({icons:{primary:'ui-icon-circle-plus'}, text:true});
});
</script>