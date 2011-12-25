<table>
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($clientes as $cli):?>
    <tr>
      <td><?php echo $cli->id?></td>
      <td><?php echo $cli->apellido?></td>
      <td><?php echo $cli->nombre?></td>
      <td><?php echo $cli->direccion?></td>
      <td><?php echo $cli->telefono?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>