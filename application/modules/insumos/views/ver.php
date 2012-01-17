<?php if($insumo->id==''):?>
<h1>Alta de Insumo</h1>
<?php else:?>
<h1>Codigo <?php echo $insumo->id;?></h1>
<?php endif;?>
<?php echo form_open($accion,'id="insumo-Form"', $ocultos);?>
<table>
  <tr>
    <th><?php echo form_label('Nombre', 'nombre')?></th>
    <td><?php echo form_input('nombre', $insumo->nombre, 'id="nombre"');?></td>
  </tr>
  <tr>
    <th>Estado</th>
    <td>
      <div id="selEstado">
        <?php echo form_label('Activo', 'estado1')?>
        <?php echo form_radio('estado', 1,($insumo->estado==1)?true:false,'id="estado1"')?>
        <?php echo form_label('Suspendido', 'estado2')?>
        <?php echo form_radio('estado', 0,($insumo->estado==0)?true:false,'id="estado2"')?>
      </div>
    </td>
  </tr>
  <?php if($insumo->id==''):?>
  <tr>
    <th><?php echo form_label('Stock Inicial', 'stock')?></th>
    <td><?php echo form_input('stock', $insumo->stock, 'id="stock"');?></td>
  </tr>
  <?php else:?>
    <th><?php echo form_label('Stock Inicial')?></th>
    <td><?php echo $insumo->stock;?></td>
  <?php endif;?>
  <tr>
    <th><?php echo form_label('Stock Minimo', 'stockMin')?></th>
    <td><?php echo form_input('stockMin', $insumo->stockMin, 'id="stockMin"');?></td>
  </tr>
  <tr>
    <td colspan="2">
      <?php echo anchor('insumos/','Cancelar','id="botCancel"')?>
      <?php if($accion=="insumos/borrarDo"):?>
        <div id="botBorrar">Borrar</div>
      <?php else:?>
        <div id="botAceptar">Grabar</div>
      <?php endif;?>
    </td>
  </tr>
</table>
<?php echo form_close();?>

<script>
$(document).ready(function(){
  $("#nombre").focus();
  $("#selEstado").buttonset();
  $("#botAceptar").button({icons:{primary:'ui-icon-disk'}});
  $("#botBorrar").button({icons:{primary:'ui-icon-trash'}});
  $("#botCancel").button({icons:{primary:'ui-icon-circle-close'}});
  $("#botAceptar").click(function(e){
    e.preventDefault();
    $("#insumo-Form").submit();
  });
  $("#botBorrar").click(function(e){
    e.preventDefault();
    $("#insumo-Form").submit();
  });
});
</script>