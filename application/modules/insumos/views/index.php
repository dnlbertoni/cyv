<h1>Listado de stock de Insumos</h1>
<table>
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Stock actual</th>
      <th>Nivel de Sotck</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($insumos as $insumo):?>
    <tr>
      <td><?php echo $insumo->id?></td>
      <td><?php echo $insumo->nombre?></td>
      <td><?php echo $insumo->stock?></td>
      <td>
       <?php if(!($insumo->stock > $insumo->stockMin)):?>
        <div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
                <strong>Cuidado:</strong> Stock por debajo del minimo</p>
            </div>
        </div>        
        <?php else:?>
        <div class="ui-widget">
                <div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;"> 
                <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span> 
                <strong>Normal </strong> Stock con niveles esperados</p>
            </div>
        </div>        
        <?php endif;?>
      </td>
      <td>
        <?php echo anchor('insumos/editar/'.$insumo->id, 'Editar', 'class="botEditar"');?>
        <?php echo anchor('insumos/borrar/'.$insumo->id, 'Borrar', 'class="botBorrar"');?>
      </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>

<script>
$(document).ready(function(){
  $('.botEditar').button({icons:{primary:'ui-icon-pencil'}, text:false});
  $('.botBorrar').button({icons:{primary:'ui-icon-trash'}, text:false});
});
</script>