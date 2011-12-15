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
</tr>
<?php $total += $f->importe?>
<?php endforeach; ?>
<tr>
<th>Total</th>
<th><?php echo $total?></th>
</tr>
</table>

