<h2 class="title">
  <a href="#">Modulo de Articulos</a>
</h2>
<p class="meta">
  <span class="date">Listado de Articulos</span>
  <span class="posted">  <?php echo anchor('articulos/nuevo','Nuevo Articulo', 'id="Nuevo"')?></span>
</p>
<div style="clear: both;">&nbsp;</div>

<div class="entry">
<p>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Precio</th>    
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articulos as $articulo):?>
    <tr>
      <td align="center"><?php echo $articulo->id?></td>
      <td><?php echo $articulo->nombre?></td>
      <td align="center"><?php echo $articulo->precio?></td>
      <td>
          <?php echo anchor('articulos/editar/'.$articulo->id,'Editar','class="botEdit"')?>
          <?php echo anchor('articulos/borrar/'.$articulo->id,'Borrar','class="botBorrar"')?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</p>
</div>

<script>
  $(document).ready(function(){
    $(".botEdit").button({icons:{primary:'ui-icon-pencil'},text:false});
    $(".botBorrar").button({icons:{primary:'ui-icon-trash'},text:false});
    $("#Nuevo").button({icons:{primary:'ui-icon-contact'}})
  });
</script>