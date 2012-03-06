<table>
  <thead>
    <tr>
      <th>
        Fecha
      </th>
      <th>
        Remito
      </th>
      <th>
        Importe
      </th>
    </tr>
  </thead>  
<?php $total=0;?>
<?php foreach($facturas as $f):?>
<tr>
  <td>
    <?php echo $f->fecha?>
  </td>
  <td>
    <?php echo $f->puesto ."-" .$f->numero?>
  </td>
  <td>
    <?php echo "$ ".$f->importe?>
  </td>
  <td>
    <?php echo anchor('pos/pdf/imprimoComprobante/'.$f->id, 'Reimprimir', 'target="_blank" class="botPrint"');?>
    <?php echo anchor('pos/ctacte/borroComprobante/'.$f->id, 'Borrar', 'class="botDel"');?>
  </td>
</tr>
<?php $total += $f->importe?>
<?php endforeach; ?>
<tr>
<th colspan="2">Total</th>
<th><?php echo sprintf("$%8.3f",$total)?></th>
</tr>
</table>

<script>
$(document).ready(function(){
  $(".botPrint").button({icons:{primary:'ui-icon-print'}, text:false});
  $(".botDel").button({icons:{primary:'ui-icon-trash'}, text:false});
});
</script>
