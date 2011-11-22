<table>
  <thead>
    <tr>
      <td>Cant.</td>
      <td colspan="2">Articulo</td>
      <td>Precio Unit.</td>
      <td>Importe</td>
    </tr>
  </thead>
<?php $total=0;?>
<?php foreach($articulos as $arti):?>
<tr>
  <td><?php echo $arti->cantidad?></td>
  <td><?php echo $arti->articulo_id?></td>
  <td><?php echo $arti->articulo_nombre?></td>
  <td><?php echo $arti->articulo_precio?></td>
  <td><?php echo $arti->importe?></td>
</tr>  
<?php $total += $arti->importe?>
<?php endforeach; ?>
<tr>
  <td colspan="4">Total</td><td><?php echo $total?></td>
</tr>
</table>
