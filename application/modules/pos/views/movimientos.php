<table width="95%" align="center" class="tableResult">
  <thead>
    <tr>
      <th>Cant.</th>
      <th colspan="2">Articulo</th>
      <th>Precio Unit.</th>
      <th>Importe</th>
    </tr>
  </thead>
<?php $total=0;?>
<?php foreach($articulos as $arti):?>
<tr >
  <td ><?php echo $arti->cantidad?></td>
  <td><?php echo $arti->articulo_id?></td>
  <td><?php echo $arti->articulo_nombre?></td>
  <td><?php echo $arti->articulo_precio?></td>
  <td><?php echo $arti->importe?></td>
</tr>  
<?php $total += $arti->importe?>
<?php endforeach; ?>
<tr class="importe">
  <th colspan="4">Total</th><th><?php echo $total?></th>
</tr>
</table>
