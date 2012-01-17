<h1>Clientes</h1>
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
      <td>
        <?php echo anchor('clientes/editar/'.$cli->id,'Editar','class="botEditar"');?>
        <?php echo anchor('clientes/borrar/'.$cli->id,'Borrar','class="botBorrar"');?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

<script>
$(document).ready(function(){
  $(".botEditar").button({icons:{primary:'ui-icon-pencil'},text:false});
  $(".botBorrar").button({icons:{primary:'ui-icon-trash'},text:false});
});
</script>